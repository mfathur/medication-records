<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        @vite('resources/css/app.css')
        <title>Pencatatan Obat</title>
    </head>
    <body>
        <main class="min-h-screen px-6 md:px-16 flex flex-col justify-center">
            <div class="flex items-center justify-center gap-x-4 lg:gap-x-8 ">
                <img src="{{ asset('img/medicine.jpg') }}" alt="medicine" class="w-96 hidden md:block">
                <div class="grid gap-y-5 max-w-sm">
                    <div class="grid gap-y-1">
                        <h3 class="text-3xl font-bold">Masuk</h3>
                        <p class="text-gray-400">Masuk dengan akun yang telah Anda daftarkan.</p>
                    </div>
                    <form class="grid gap-y-5" action="">
                        <label class="input input-bordered flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" /><path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" /></svg>
                            <input type="text" class="grow" placeholder="Email" />
                          </label>
                          <label class="input input-bordered flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
                            <input type="password" class="grow" placeholder="Password" />
                          </label>
                          <button type="submit" class="btn btn-primary w-full ">Masuk</button>
                    </form>
                    
                    <p class="text-center">Belum punya akun? <a href="{{url('register')}}" class="text-primary font-medium">Daftar</a></p>
                </div>
            </div>
        </main>
        
    </body>
</html>
