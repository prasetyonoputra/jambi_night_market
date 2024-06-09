<?php

use App\Http\Controllers\InformationController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

    Route::resource('products', ProductController::class);
    Route::resource('information', InformationController::class);
    Route::resource('user', UserController::class);
    Route::resource('umkm', UmkmController::class);
    Route::resource('pembelian', PembelianController::class);

    Route::get('/pembelian/{id}/bayar', [PembelianController::class, 'bayar'])->name('pembelian.bayar');
    Route::get('/pembelian/{id}/kirim', [PembelianController::class, 'kirim'])->name('pembelian.kirim');
    Route::get('/pembelian/{id}/tolak', [PembelianController::class, 'tolak'])->name('pembelian.tolak');

});
