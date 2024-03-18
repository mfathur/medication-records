@extends('layout.main')
@section('content')
    <main class="px-4 md:px-10 py-6">
        <h1 class="text-2xl font-bold">Ubah Data Obat</h1>
        <hr class="my-4">
        <form class="flex flex-col md:p-10 gap-y-6" action="{{ route('medicine.putMedic', ['id' => $medicine->id]) }}"
            method="POST">
            @csrf
            @method('PUT')
            <div class="flex gap-x-4">
                <div class="w-full">
                    <input name="name" type="text" placeholder="Nama" class="input input-bordered w-full"
                        value="{{ $medicine->name }}" />
                    @error('name')
                        <small class="mt-1 ml-2 text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full">
                    <input name="manufacturer" type="text" placeholder="Instansi pembuat"
                        class="input input-bordered w-full" value="{{ $medicine->manufacturer }}" />
                    @error('manufacturer')
                        <small class="mt-1 ml-2 text-red-600">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div>
                <textarea name="description" class="textarea textarea-bordered text-base w-full" placeholder="Deskripsi">{{ $medicine->description }}</textarea>
                @error('description')
                    <small class="mt-1 ml-2 text-red-600">{{ $message }}</small>
                @enderror
            </div>
            <div class="flex gap-x-4">
                <div>
                    <input name="stock" type="number" placeholder="Stok" class="input input-bordered w-24"
                        value="{{ $medicine->stock }}" />
                    @error('stock')
                        <br>
                        <small class="mt-1 text-red-600">{{ $message }}</small>
                    @enderror
                </div>
                <div class="w-full">
                    <select name="type" class="select select-bordered w-full">
                        <option disabled>Golongan obat
                        </option>
                        <option value="hijau" @if ($medicine->medicine_types == 'hijau') selected @endif>Obat bebas yang dapat
                            dibeli tanpa resep dokter</option>
                        <option value="biru" @if ($medicine->medicine_types == 'biru') selected @endif>Obat keras, namun bebas
                            terbatas, bisa dibeli tanpa resep dokter</option>
                        <option value="simbol_k" @if ($medicine->medicine_types == 'simbol_k') selected @endif>Obat keras dan
                            psikotropika yang harus disertai dengan resep dokter
                        </option>
                        <option value="salju" @if ($medicine->medicine_types == 'salju') selected @endif>Merujuk pada obat-obatan
                            fitofarmaka, mirip OHT, namun pengolahannya
                            menggunakan
                            teknologi yang lebih tinggi</option>
                        <option value="palang_medali_merah" @if ($medicine->medicine_types == 'palang_medali_merah') selected @endif>Obat
                            berbahaya jenis
                            narkotika dan dibeli juga disertai resep
                            dokter
                        </option>
                        <option value="tiga_bintang" @if ($medicine->medicine_types == 'tiga_bintang') selected @endif>Obat Herbal
                            Terstandar (OHT) yakni terbuat dari bahan dasar alami dan
                            diproses dengan teknologi tinggi</option>
                        <option value="pohon_hijau">Jamu atau
                            jenis obat dari bahan dasar herbal atau tanaman tradisional
                        </option>
                    </select>
                    @error('type')
                        <small class="mt-1 ml-2 text-red-600">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div>
                <p class="font-medium ">Klasifikasi Obat</p>
                @error('classification_ids')
                    <small class="inline-block  text-red-600"">{{ $message }}</small>
                @enderror
                <div class="grid gap-8 md:grid-cols-3 flex-wrap	 grid-cols-2 mt-4">
                    @foreach ($medicineClassifications as $medicClass)
                        <div class="flex items-center gap-2">
                            <input name="classification_ids[]" type="checkbox" class="checkbox"
                                value="{{ $medicClass->id }}" @if (in_array($medicClass->id, json_decode($medicine->classification_ids, true))) checked @endif />
                            {{ $medicClass->classification_name }}
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-primary self-end mt-4 w-full md:w-auto">Simpan</button>
        </form>
    </main>
@endsection
