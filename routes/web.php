<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', \App\Http\Controllers\HomeController::class);
Route::get('/detail/{blog}', [\App\Http\Controllers\HomeController::class, 'show'])->name('home.blog.detail');
// Route::get('/detail/{id}', [\App\Http\Controllers\DetailController::class, 'index'])->name('detail');
// GET : HANYA MEMBACA, POST : REQUEST KE DALAM SERVER MENGGUNAKAN FORM, PUT : REQUEST KE DALAM SERVER MENGGUNAKAN FORM PUT DI PERUNTUKAN UNTUK UPDATE DAN DATANYA BANYAK,
// PATCH : FORM PATCH UNTUK UPDATE DAN DATANYA HANYA SATU, DELETE : REQUEST KE DALAM SERVER MENGGUNAKAN FORM DELETE

// Route::get('belajar-laravel', [\App\Http\Controllers\BelajaController::class, 'index'])->name('belajar-laravel');
// Route::get('penjumlahan', [\App\Http\Controllers\BelajaController::class, 'tambah'])->name('penjumlahan');
// Route::get('pengurangan', [\App\Http\Controllers\BelajaController::class, 'kurang'])->name('pengurangan');
// Route::get('pembagian', [\App\Http\Controllers\BelajaController::class, 'bagi'])->name('pembagian');
// Route::get('perkalian', [\App\Http\Controllers\BelajaController::class, 'kali'])->name('perkalian');
// Route::post('store-tambah', [\App\Http\Controllers\BelajaController::class, 'storetambah'])->name('store-tambah');a
// Route::post('store-kurang', [\App\Http\Controllers\BelajaController::class, 'storekurang'])->name('store-kurang');
// Route::post('store-bagi', [\App\Http\Controllers\BelajaController::class, 'storebagi'])->name('store-bagi');
// Route::post('store-kali', [\App\Http\Controllers\BelajaController::class, 'storekali'])->name('store-kali');

//PREFIX
Route::get('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('action-login', [\App\Http\Controllers\LoginController::class, 'actionlogin'])->name('action-login');

Route::prefix('admin')->group(function(){
    Route::resource('/dashboard', \App\Http\Controllers\Admin\DashboardController::class);
    Route::resource('/contact', \App\Http\Controllers\Admin\ContactController::class);
    Route::resource('/blog', \App\Http\Controllers\Admin\BlogController::class);
});
//student
Route::get('/student', [\App\Http\Controllers\Admin\StudentController::class,'index'])->name('student');
Route::post('/student/simpan', [\App\Http\Controllers\Admin\StudentController::class,'simpan']);
Route::post('/student/update/{id}', [\App\Http\Controllers\Admin\StudentController::class,'update']);
Route::get('/student/hapus/{id}', [\App\Http\Controllers\Admin\StudentController::class,'hapus']);

//user


//logout
Route::get('/logout', [App\Http\Controllers\LoginController::class,'logout'])->name('logout');
//register
Route::get('register',[\App\Http\Controllers\RegisterController::class, 'register'])->name('register');
Route::post('register/action', [\App\Http\Controllers\RegisterController::class, 'actionRegister'])->name('register.action');
//admin
route::middleware('auth')->group(function(){
    //dashboard
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    //student
    Route::get('/admin/student', [App\Http\Controllers\Admin\StudentController::class,'index'])->name('student');
    route::post('/admin/student/simpan', [App\Http\Controllers\Admin\StudentController::class, 'simpan']);
    route::post('/admin/student/update/{id}', [App\Http\Controllers\Admin\StudentController::class, 'update']);
    route::get('/admin/student/hapus/{id}', [App\Http\Controllers\Admin\StudentController::class, 'hapus']);
Route::resource('/user', \App\Http\Controllers\Admin\UserController::class);

    Route::get('admin/user', [\App\Http\Controllers\Admin\UserController::class,'index'])->name('user');
    Route::post('admin/user/simpan', [\App\Http\Controllers\Admin\UserController::class,'simpan']);
    Route::post('admin/user/update/{id}', [\App\Http\Controllers\Admin\UserController::class,'update']);
    Route::get('admin/user/hapus/{id}', [\App\Http\Controllers\Admin\UserController::class,'hapus']);
});

