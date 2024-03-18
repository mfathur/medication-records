<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineClassification;
use App\Models\MedicineClassificationMapping;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedicController extends Controller
{
    public function create()
    {
        $medicineClassifications = MedicineClassification::all();
        return view('medicine.create', compact('medicineClassifications'));
    }

    public function update()
    {
        return view('medicine.update');
    }

    public function putMedic()
    {
        // implement update medicine
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

        return redirect()->route('dashboard');
    }
}
