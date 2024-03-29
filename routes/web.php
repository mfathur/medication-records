<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/postRegister', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [MedicController::class, 'index'])->name('medicine.dashboard');

    Route::get('/medics/create', [MedicController::class, 'create'])->name('medicine.create');
    Route::post('/medics/postMedic', [MedicController::class, 'postMedic'])->name('medicine.postMedic');

    Route::get('/medics/{id}', [MedicController::class, 'detail'])->name('medicine.detail');

    Route::get('/medics/{id}/update', [MedicController::class, 'update'])->name('medicine.update');
    Route::put('/medics/{id}/putMedic', [MedicController::class, 'putMedic'])->name('medicine.putMedic');

    Route::delete('/medics/{id}/deleteMedic', [MedicController::class, 'deleteMedic'])->name('medicine.deleteMedic');
});
