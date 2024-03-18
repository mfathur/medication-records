<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineClassification;
use App\Models\MedicineClassificationMapping;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedicController extends Controller
{
    public function index()
    {
        // fetch all medicines data
        $medicines = Medicine::select('medicines.id', 'medicines.name', 'medicines.medicine_types', 'medicines.stock')
            ->selectRaw('GROUP_CONCAT(medicine_classifications.classification_name) AS classification_names')
            ->join('medicine_classification_mapping', 'medicines.id', '=', 'medicine_classification_mapping.medicine_id')
            ->join('medicine_classifications', 'medicine_classification_mapping.classification_id', '=', 'medicine_classifications.id')
            ->groupBy('medicines.id', 'medicines.name', 'medicines.medicine_types', 'medicines.stock')
            ->get();

        return view('medicine.dashboard', compact('medicines'));
    }

    public function create()
    {
        // fetch medicine classifications, used for dropdown input value 
        $medicineClassifications = MedicineClassification::all();
        return view('medicine.create', compact('medicineClassifications'));
    }

    public function update($id)
    {
        // fetch a medicine detail by its id 
        $medicines = Medicine::select('medicines.id', 'medicines.name', 'medicines.description', 'medicines.manufacturer', 'medicines.medicine_types', 'medicines.stock')
            ->selectRaw('CONCAT("[",GROUP_CONCAT(medicine_classifications.id),"]") AS classification_ids')
            ->join('medicine_classification_mapping', 'medicines.id', '=', 'medicine_classification_mapping.medicine_id')
            ->join('medicine_classifications', 'medicine_classification_mapping.classification_id', '=', 'medicine_classifications.id')
            ->where('medicines.id', $id) // by id
            ->groupBy('medicines.id', 'medicines.name', 'medicines.description', 'medicines.manufacturer', 'medicines.medicine_types', 'medicines.stock')
            ->get();

        // fetch medicine classifications, used for dropdown input value 
        $medicineClassifications = MedicineClassification::all();
        return view('medicine.update', ['medicineClassifications' => $medicineClassifications, 'medicine' => $medicines[0]]);
    }

    public function detail($id)
    {
        // fetch a medicine detail by its id 
        $medicines = Medicine::select('medicines.id', 'medicines.name', 'medicines.description', 'medicines.manufacturer', 'medicines.medicine_types', 'medicines.stock')
            ->selectRaw('GROUP_CONCAT(medicine_classifications.classification_name) AS classification_names')
            ->join('medicine_classification_mapping', 'medicines.id', '=', 'medicine_classification_mapping.medicine_id')
            ->join('medicine_classifications', 'medicine_classification_mapping.classification_id', '=', 'medicine_classifications.id')
            ->where('medicines.id', $id)
            ->groupBy('medicines.id', 'medicines.name', 'medicines.description', 'medicines.manufacturer', 'medicines.medicine_types', 'medicines.stock')
            ->get();

        return view('medicine.detail', ['medicine' => $medicines[0]]);
    }

    public function deleteMedic($id)
    {
        $medic = Medicine::find($id);
        if ($medic) {
            $medic->delete(); // delete the data if exists
        }

        return redirect()->route('medicine.dashboard');
    }

    public function putMedic(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'manufacturer' => 'required',
            'stock' => 'required',
            'type' => 'required',
            'classification_ids' => 'required|array|min:1'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'manufacturer.required' => 'Nama instansi pembuat obat tidak boleh kosong',
            'stock.required' => 'Stok tidak boleh kosong',
            'type.required' => 'Golongan obat tidak boleh kosong',
            'classification_ids.required' => 'Obat minimal tergolong dalam 1 klasifikasi',
        ]);

        $timestampNow = Carbon::now();

        $medic = Medicine::findOrFail($id);
        $medic->update([
            'name' => $request->name,
            'description' => $request->description,
            'manufacturer' => $request->manufacturer,
            'medicine_types' => $request->type,
            'stock' => $request->stock,
            'updated_at' => $timestampNow
        ]);

        // delete all previous medicine classifications 
        MedicineClassificationMapping::where('medicine_id', '=', $id)->delete();

        // insert new medicine classifications
        $medicClasses = [];
        foreach ($request->classification_ids as $medicClassId) {
            $data = [
                'medicine_id' => $id,
                'classification_id' => $medicClassId,
                'created_at' => $timestampNow,
                'updated_at' => $timestampNow
            ];

            array_push($medicClasses, $data);
        }
        MedicineClassificationMapping::insert($medicClasses);

        return redirect()->route('medicine.dashboard');
    }

    public function postMedic(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'manufacturer' => 'required',
            'stock' => 'required',
            'type' => 'required',
            'classification_ids' => 'required|array|min:1'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'manufacturer.required' => 'Nama instansi pembuat obat tidak boleh kosong',
            'stock.required' => 'Stok tidak boleh kosong',
            'type.required' => 'Golongan obat tidak boleh kosong',
            'classification_ids.required' => 'Obat minimal tergolong dalam 1 klasifikasi',
        ]);

        $timestampNow = Carbon::now();

        $medicData = [
            'name' => $request->name,
            'description' => $request->description,
            'manufacturer' => $request->manufacturer,
            'medicine_types' => $request->type,
            'stock' => $request->stock,
            'created_at' => $timestampNow,
            'updated_at' => $timestampNow
        ];

        // insert to medicine table
        $medic = Medicine::create($medicData);
        $medicId = $medic->id;

        // insert medic classifications
        $medicClasses = [];
        foreach ($request->classification_ids as $medicClassId) {
            $data = [
                'medicine_id' => $medicId,
                'classification_id' => $medicClassId,
                'created_at' => $timestampNow,
                'updated_at' => $timestampNow
            ];

            array_push($medicClasses, $data);
        }
        MedicineClassificationMapping::insert($medicClasses);

        return redirect()->route('medicine.dashboard');
    }
}
