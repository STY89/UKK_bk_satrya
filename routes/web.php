<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Halaman utama
Route::get('/', function () {
    return view('welcome'); // welcome.blade.php
})->name('home');

// ====== LOGIN ======
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// ====== REGISTER ======
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// ====== DASHBOARD ======
Route::get('/dashboard', function () {
    return view('dashboard.menu');
})->middleware('auth')->name('dashboard');

// ====== LOGOUT ======
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

