<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\StatistikController;

// HALAMAN UTAMA
Route::get('/', function () {
    return view('welcome');
})->name('home');

// LOGIN & REGISTER
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard.menu');
})->middleware('auth')->name('dashboard');

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CRUD
Route::middleware('auth')->group(function () {
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('konseling', KonselingController::class);
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
});
