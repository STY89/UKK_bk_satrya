<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ====== LOGIN FORM ======
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ====== LOGIN PROSES ======
    public function login(Request $request)
    {
        // ✅ Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // ✅ Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // (Opsional) arahkan berdasarkan role
            if (Auth::user()->role === 'ADMIN') {
                return redirect()->route('dashboard');
            }

            return redirect()->intended('/dashboard');
        }

        // ❌ Kalau gagal login → tampilkan pesan error dan kosongkan password
        return back()
            ->with('error', 'Email atau password salah!')
            ->withInput($request->except('password')); // biar password kosong, email tetap keisi
    }

    // ====== REGISTER FORM ======
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // ====== REGISTER PROSES ======
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // ✅ Simpan user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->input('role', 'SISWA'), // default role SISWA
        ]);

        // ✅ Auto login setelah register
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
