<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// GET : HANYA MEMBACA, POST : REQUEST KE DALAM SERVER MENGGUNAKAN FORM, PUT : REQUEST KE DALAM SERVER MENGGUNAKAN FORM PUT DI PERUNTUKAN UNTUK UPDATE DAN DATANYA BANYAK,
// PATCH : FORM PATCH UNTUK UPDATE DAN DATANYA HANYA SATU, DELETE : REQUEST KE DALAM SERVER MENGGUNAKAN FORM DELETE

Route::get('belajar-laravel', [\App\Http\Controllers\BelajaController::class, 'index'])->name('belajar-laravel');
Route::get('penjumlahan', [\App\Http\Controllers\BelajaController::class, 'tambah'])->name('penjumlahan');
Route::get('pengurangan', [\App\Http\Controllers\BelajaController::class, 'kurang'])->name('pengurangan');
Route::get('pembagian', [\App\Http\Controllers\BelajaController::class, 'bagi'])->name('pembagian');
Route::get('perkalian', [\App\Http\Controllers\BelajaController::class, 'kali'])->name('perkalian');
Route::post('store-tambah', [\App\Http\Controllers\BelajaController::class, 'storetambah'])->name('store-tambah');
Route::post('store-kurang', [\App\Http\Controllers\BelajaController::class, 'storekurang'])->name('store-kurang');
Route::post('store-bagi', [\App\Http\Controllers\BelajaController::class, 'storebagi'])->name('store-bagi');
Route::post('store-kali', [\App\Http\Controllers\BelajaController::class, 'storekali'])->name('store-kali');
