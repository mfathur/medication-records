<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Pencatatan Obat</title>
</head>

<body>
    <div class="drawer lg:drawer-open">
        <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
        <div class="drawer-content flex flex-col">
            <!-- Page content here -->
            <label for="my-drawer-2" class="self-start">
                <i class="fa-solid fa-bars  p-4 text-lg lg:hidden"></i>
            </label>
            @yield('content')

        </div>
        <div class="drawer-side">
            <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
            <div class="min-h-screen bg-primary text-primary-content">
                <div class="p-4 flex gap-x-4 items-center">
                    <img src="{{ asset('img/hospital.jpg') }}" alt="Rumah Sakit A" class="w-10 h-10 rounded-lg">
                    <h3 class="font-bold">Rumah Sakit A</h3>
                </div>

                <ul class="menu p-4 w-64 font-medium">
                    <!-- Sidebar content here -->
                    <li>
                        <div><i class="fa-solid fa-pills"></i> <a href="{{ route('dashboard') }}">Daftar Obat</a></div>
                    </li>

                    <li class="mt-4">
                        <div><i class="fa-solid fa-arrow-right-from-bracket"></i> <a
                                href="{{ route('logout') }}">Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
