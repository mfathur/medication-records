@extends('layout.main')
@section('content')
    <main class="px-10 py-6 min-h-screen flex flex-col">
        <h1 class="text-2xl font-bold">Daftar Obat</h1>
        <hr class="mt-4">
        <div class="mt-8 flex flex-col gap-y-4">
            <a class="self-end" href="{{ route('medicine.create') }}">
                <button class="btn btn-primary "><i class="fa-solid fa-plus"></i> Tambah Obat</button>
            </a>
            <div class="overflow-x-auto overflow-y-visible">
                <table class="table table-zebra ">
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
                                        <form action="{{ route('medicine.deleteMedic', ['id' => $medic->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="tooltip tooltip-bottom" data-tip="Hapus">
                                                <button type="submit" class="hover:text-primary"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </div>
                                        </form>

                                        <form
                                            action="{{ route('medicine.detail', ['id' => $medic->id, 'medic' => $medic]) }}"
                                            method="GET">
                                            @csrf
                                            <div class="tooltip tooltip-bottom" data-tip="Lihat detail">
                                                <button class="hover:text-primary"><i
                                                        class="fa-solid fa-ellipsis ml-4"></i></button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Toast --}}
        @if (Session::has('success'))
            <div class="toast toast-top toast-center">
                <div class="alert alert-success text-primary-content bg-primary">
                    <span>{{ Session::get('success') }}</span>
                </div>
            </div>
        @endif

    </main>
    <script>
        const toasts = document.getElementsByClassName("toast");

        setTimeout(function() {
            for (let i = 0; i < toasts.length; i++) {
                toasts[i].style.display = "none";
            }
        }, 3000);
    </script>
@endsection
