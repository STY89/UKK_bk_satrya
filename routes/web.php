<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ConselingController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiswaController;

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
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


// =========================
// LOGOUT
// =========================
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// =========================
// FITUR UTAMA SETELAH LOGIN
// =========================
Route::middleware('auth')->group(function () {

    // Monitoring
    Route::resource('monitoring', MonitoringController::class);

    // Prestasi
    Route::resource('prestasi', PrestasiController::class);


    // ======================
    //  KONSELING (PERBAIKAN)
    // ======================

    // Guru BK → halaman daftar konseling
   Route::get('/konseling', [ConselingController::class, 'index'])->name('konseling.index');
   Route::get('/konseling/ajukan', [ConselingController::class, 'create'])->name('konseling.create');
   Route::post('/konseling/store', [ConselingController::class, 'store'])->name('konseling.store');
   Route::get('/konseling/detail/{id}', [ConselingController::class, 'detail'])->name('konseling.detail');
   Route::post('/konseling/setujui/{id}', [ConselingController::class, 'setujui'])->name('konseling.setujui');

    // Statistik
    Route::get('/statistik', [StatistikController::class, 'index'])
        ->name('statistik.index');

    // Data Siswa
    Route::resource('siswa', SiswaController::class);


    // ======================
    // BK AI
    // ======================
    Route::get('/bk-ai', [\App\Http\Controllers\BKAiController::class, 'index'])
        ->name('bk.ai');

    Route::post('/bk-ai/chat', [\App\Http\Controllers\BKAiController::class, 'chat'])
        ->name('bk.ai.chat');
});
