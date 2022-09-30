<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // Redirect ke halaman login
    return redirect()->route('login');
});

Auth::routes();

// Middleware untuk mengecek apakah user sudah login atau belum
Route::group(['middleware' => 'auth'], function () {
    // Route untuk mengakses home.blade pada HomeController
    Route::get('/beranda', [App\Http\Controllers\HomeController::class, 'index'])->name('beranda');
    
    // Group function untuk jurusan
    Route::group(['prefix' => 'jurusan'], function () {
        Route::get('/', [App\Http\Controllers\JurusanController::class, 'index'])->name('jurusan.index');
        Route::get('/create', [App\Http\Controllers\JurusanController::class, 'create'])->name('jurusan.create');
        Route::post('/store', [App\Http\Controllers\JurusanController::class, 'store'])->name('jurusan.store');
        Route::get('/edit/{id}', [App\Http\Controllers\JurusanController::class, 'edit'])->name('jurusan.edit');
        Route::post('/update/{id}', [App\Http\Controllers\JurusanController::class, 'update'])->name('jurusan.update');
        Route::get('/delete/{id}', [App\Http\Controllers\JurusanController::class, 'destroy'])->name('jurusan.destroy');
    });
});