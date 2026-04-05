<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/karyawan/create', [KaryawanController::class, 'create']);
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::put('/karyawan/update/{id}', [KaryawanController::class, 'update']);
Route::delete('/karyawan/delete/{id}', [KaryawanController::class, 'destroy']);

Route::middleware(['auth'])->group(function () {
    Route::get('/karyawan', [KaryawanController::class, 'index']);
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');