<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', fn () => view('auth.login'))->name('login');

// Route POST untuk login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route dashboard, hanya bisa diakses user yang login
Route::get('/dashboard', function() {
    return view('dashboard'); // buat file dashboard.blade.php
})->middleware('auth');
