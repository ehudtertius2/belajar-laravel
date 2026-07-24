<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', \App\Http\Controllers\HomeController::class);

// GET : HANYA MEMBACA, POST : REQUEST KE DALAM SERVER MENGGUNAKAN FORM, PUT : REQUEST KE DALAM SERVER MENGGUNAKAN FORM PUT DI PERUNTUKAN UNTUK UPDATE DAN DATANYA BANYAK,
// PATCH : FORM PATCH UNTUK UPDATE DAN DATANYA HANYA SATU, DELETE : REQUEST KE DALAM SERVER MENGGUNAKAN FORM DELETE

// Route::get('belajar-laravel', [\App\Http\Controllers\BelajaController::class, 'index'])->name('belajar-laravel');
// Route::get('penjumlahan', [\App\Http\Controllers\BelajaController::class, 'tambah'])->name('penjumlahan');
// Route::get('pengurangan', [\App\Http\Controllers\BelajaController::class, 'kurang'])->name('pengurangan');
// Route::get('pembagian', [\App\Http\Controllers\BelajaController::class, 'bagi'])->name('pembagian');
// Route::get('perkalian', [\App\Http\Controllers\BelajaController::class, 'kali'])->name('perkalian');
// Route::post('store-tambah', [\App\Http\Controllers\BelajaController::class, 'storetambah'])->name('store-tambah');
// Route::post('store-kurang', [\App\Http\Controllers\BelajaController::class, 'storekurang'])->name('store-kurang');
// Route::post('store-bagi', [\App\Http\Controllers\BelajaController::class, 'storebagi'])->name('store-bagi');
// Route::post('store-kali', [\App\Http\Controllers\BelajaController::class, 'storekali'])->name('store-kali');

//PREFIX
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionlogin'])->name('action-login');
Route::prefix('admin')->group(function(){
    Route::resource('/dashboard', \App\Http\Controllers\Admin\DashboardController::class);
});
//student
Route::get('/student', [\App\Http\Controllers\Admin\StudentController::class,'index'])->name('student');
Route::post('/student/simpan', [\App\Http\Controllers\Admin\StudentController::class,'simpan']);
Route::post('/student/update/{id}', [\App\Http\Controllers\Admin\StudentController::class,'update']);
Route::get('/student/hapus/{id}', [\App\Http\Controllers\Admin\StudentController::class,'hapus']);
