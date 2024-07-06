<?php

use Illuminate\Support\Facades\Route;

// routes/web.php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Route untuk menampilkan form login
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// Route untuk menangani proses login
Route::post('login', [AuthController::class, 'login']);

// Route untuk menangani proses logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Route default untuk menampilkan halaman utama atau dashboard
Route::get('/', function () {
    return view('login'); // Ubah ini jika ingin menggunakan controller atau view lain
});

Route::get('tampil_dashboard', [DashboardController::class, 'tampil_dashboard'])->name('tampil_dashboard');
