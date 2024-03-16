<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Pencatatan Obat | Daftar</title>
</head>

<body>
    <main class="min-h-screen px-6 md:px-16 flex flex-col justify-center">
        <div class="flex items-center justify-center gap-x-4 lg:gap-x-8 ">
            <img src="{{ asset('img/medicine.jpg') }}" alt="medicine" class="w-96 hidden md:block">
            <div class="grid gap-y-5 max-w-sm">
                <div class="grid gap-y-1">
                    <h3 class="text-3xl font-bold">Daftar</h3>
                    <p class="text-gray-400">Mari bergabung bersama kami!</p>
                </div>
                <form class="grid gap-y-5" action="{{ route('postRegister') }}" method="POST">
                    @csrf
                    <div>
                        <label class="input input-bordered flex items-center gap-2">
                            <i class="fa-solid fa-user text-gray-500 text-sm"></i>
                            <input type="text" name="name" class="grow" placeholder="Nama"
                                value="{{ old('name') }}" />
                        </label>
                        @error('name')
                            <small class="mt-1 text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label class="input input-bordered flex items-center gap-2">
                            <i class="fa-solid fa-envelope text-gray-500 text-sm"></i>
                            <input type="text" name="email" class="grow" placeholder="Email" />
                        </label>
                        @error('email')
                            <small class="mt-1 text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="input input-bordered flex items-center gap-2">
                            <i class="fa-solid fa-key text-gray-500 text-sm"></i>
                            <input type="password" name="password" class="grow" placeholder="Password" />
                        </label>
                        @error('password')
                            <small class="mt-1 text-red-600">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-full ">Daftar</button>
                </form>

                <p class="text-center">Sudah punya akun? <a href="{{ url()->previous() }}"
                        class="text-primary font-medium">Masuk</a></p>
            </div>
        </div>
    </main>
</body>

</html>
