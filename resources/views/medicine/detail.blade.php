@extends('layout.main')
@section('content')
    <main class="px-4 md:px-10 py-6">
        <div class="flex gap-x-4 items-center">
            <h1 class="text-2xl font-bold">Detail Obat</h1>
            <i class="fa-solid fa-pen text-gray-400 hover:text-primary"></i>
        </div>
        <hr class="my-4">
        <div class="flex flex-col md:p-10 gap-y-6">
            <div class="flex gap-x-4">
                <div class="w-full">
                    <p class="font-bold text-lg">Nama Obat</p>
                    <p>{{ $medicine->name }}</p>
                </div>
                <div class="w-full">
                    <p class="font-bold text-lg">Instansi Pembuat Obat</p>
                    <p>{{ $medicine->manufacturer }}</p>
                </div>
            </div>
            <div>
                <p class="font-bold text-lg">Deskripsi</p>
                <p>{{ $medicine->description }}</p>
            </div>
            <div class="flex gap-x-4">
                <div>
                    <p class="font-bold text-lg mr-6">Stok</p>
                    <p>{{ $medicine->stock }}</p>
                </div>
                <div class="w-full">
                    <p class="font-bold text-lg">Golongan obat</p>
                    @switch($medicine->medicine_types)
                        @case('hijau')
                            <p>Obat bebas yang dapat dibeli tanpa resep dokter</p>
                        @break

                        @case('biru')
                            <p>Obat keras, namun bebas terbatas, bisa dibeli tanpa resep dokter</p>
                        @break

                        @case('simbol_k')
                            <p>Obat keras dan psikotropika yang harus disertai dengan resep dokter</p>
                        @break

                        @case('salju')
                            <p>Merujuk pada obat-obatan fitofarmaka, mirip OHT, namun pengolahannya
                                menggunakan teknologi yang lebih tinggi</p>
                        @break

                        @case('palang_medali_merah')
                            <p>Obat berbahaya jenis narkotika dan dibeli juga disertai resep
                                dokter</p>
                        @break

                        @case('tiga_bintang')
                            <p>Obat Herbal Terstandar (OHT) yakni terbuat dari bahan dasar alami dan
                                diproses dengan teknologi tinggi</p>
                        @break

                        @case('pohon_hijau')
                            Jamu atau jenis obat dari bahan dasar herbal atau tanaman tradisional
                        @break
                    @endswitch
                </div>
            </div>
            <div>
                <p class="font-bold text-lg">Klasifikasi Obat</p>
                <p>{{ $medicine->classification_names }}</p>
            </div>
        </div>
    </main>
@endsection
