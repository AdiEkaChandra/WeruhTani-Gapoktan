<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// Route ke halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Route admin (hanya untuk user yang terautentikasi)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/buat-pesanan', [AdminController::class, 'buatPesanan'])->name('buat_pesanan');
    Route::post('/simpan-pesanan', [AdminController::class, 'simpanPesanan'])->name('simpan_pesanan');
});

// Route untuk prediksi
Route::post('/predict', function (Illuminate\Http\Request $request) {
    return response()->json([
        'hours' => 1,
        'minutes' => 30,
        'seconds' => 45,
    ]);
})->name('predict');