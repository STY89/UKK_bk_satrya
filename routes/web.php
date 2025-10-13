<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\MonitoringController;

Route::get('/', function () {
    return view('welcome', [
        'isLoggedIn' => Auth::check(),
        'user' => Auth::user()
    ]);
})->name('home');

// =========================
// LOGIN & REGISTER
// =========================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// =========================
// DASHBOARD
// =========================
Route::get('/dashboard', function () {
    return view('dashboard.menu');
})->middleware('auth')->name('dashboard');

// =========================
// LOGOUT
// =========================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =========================
// FITUR-FITUR UTAMA (HANYA UNTUK LOGIN USER)
// =========================
Route::middleware('auth')->group(function () {

    // Monitoring siswa
    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring.index');

    // Prestasi
    Route::resource('prestasi', PrestasiController::class);

    // Konseling
    Route::resource('konseling', KonselingController::class);

    // Statistik
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
});

