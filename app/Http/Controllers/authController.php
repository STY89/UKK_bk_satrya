<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ====== FORM LOGIN ======
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ====== PROSES LOGIN ======
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $role = Auth::user()->role;

            // 🔥 Redirect otomatis sesuai role dari database
            switch ($role) {
                case 'GURU_BK':
                    return redirect()->route('dashboard'); // admin BK

                case 'SISWA':
                case 'WALI_MURID':
                case 'WALI_KELAS':
                case 'KEPALA_SEKOLAH':
                    return redirect()->route('dashboard'); // dashboard user biasa

                default:
                    Auth::logout();
                    return back()->with('error', 'Role tidak dikenali!');
            }
        }

        return back()
            ->with('error', 'Email atau password salah!')
            ->withInput($request->except('password'));
    }

    // ====== FORM REGISTER ======
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // ====== PROSES REGISTER ======
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'SISWA'  // default role
        ]);


        Auth::login($user);

        return redirect()->route('dashboard');
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
