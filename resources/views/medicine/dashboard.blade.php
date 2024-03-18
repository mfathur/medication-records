@extends('layout.main')
@section('content')
    <main class="px-10 py-6">
        <h1 class="text-2xl font-bold">Daftar Obat</h1>
        <hr class="mt-4">
        <div class="mt-8 flex flex-col gap-y-4">
            <a class="self-end" href="{{ route('medicine.create') }}">
                <button class="btn btn-primary "><i class="fa-solid fa-plus"></i> Tambah Obat</button>
            </a>
            <div class="overflow-x-auto">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Klasifikasi</th>
                            <th>
                                Stok
                            </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicines as $medic)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $medic->name }}</td>
                                <td>
                                    @if ($medic->medicine_types == 'hijau')
                                        Bebas
                                    @elseif($medic->medicine_types == 'palang_medali_merah')
                                        Narkotika
                                    @elseif($medic->medicine_types == 'biru')
                                        Bebas terbatas
                                    @elseif($medic->medicine_types == 'tiga_bintang')
                                        Herbal terstandar
                                    @elseif($medic->medicine_types == 'pohon_hijau')
                                        Jamu
                                    @elseif($medic->medicine_types == 'simbol_k')
                                        Keras
                                    @elseif($medic->medicine_types == 'salju')
                                        Fitofarmaka
                                    @endif
                                </td>
                                <td>{{ $medic->classification_names }}</td>
                                <td>{{ $medic->stock }}</td>
                                <td>
                                    <div class="flex flex-nowrap">
                                        <i class="fa-solid fa-trash"></i>
                                        <i class="fa-solid fa-ellipsis ml-4"></i>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>
@endsection
