<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ====== LOGIN ======
    public function showLoginForm()
    {
        return view('auth.login'); // view login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Login berhasil
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        // Login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }

    // ====== REGISTER ======
    public function showRegisterForm()
    {
        return view('auth.register'); 
        // pastikan file ada di resources/views/auth/register.blade.php
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // otomatis cek password_confirmation
        ]);

        // Simpan user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // password aman
            'role' => 'SISWA', // default role
        ]);

        // Auto login setelah register
        Auth::login($user);

        return redirect('/dashboard');
    }

    // ====== LOGOUT ======
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
