<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // <-- Pastikan ini di-import

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data siswa
        // Kami mengasumsikan siswa adalah user dengan kolom 'role' bernilai 'SISWA'
        $siswa = User::where('role', 'SISWA')->get(); 
        
        // CATATAN: Jika Anda memiliki Model Siswa yang terpisah, 
        // ganti baris di atas dengan: $siswa = App\Models\Siswa::all(); 

        // 2. Kirim data ke view dashboard.menu
        return view('dashboard.menu', [
            'siswa' => $siswa
        ]);
    }
}