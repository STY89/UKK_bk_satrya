<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // ← HARUS ADA

class Userseeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'GURU_BK',
            'email' => 'admin@gmail.com',
            'role' => 'GURU_BK',
            'password' => bcrypt('admin123')
        ]);

        User::create([
            'name' => 'WALI_KELAS',
            'email' => 'wali_kelas@gmail.com',
            'role' => 'WALI_KELAS',
            'password' => bcrypt('user123')
        ]);

        User::create([
            'name' => 'SISWA',
            'email' => 'siswa@gmail.com',
            'role' => 'SISWA',
            'password' => bcrypt('user123')
        ]);

        User::create([
            'name' => 'WALI_MURID',
            'email' => 'wali_murid@gmail.com',
            'role' => 'WALI_MURID',
            'password' => bcrypt('user123')
        ]);

        User::create([
            'name' => 'KEPALA_SEKOLAH',
            'email' => 'kepala_sekolah@gmail.com',
            'role' => 'KEPALA_SEKOLAH',
            'password' => bcrypt('user123')
        ]);
    }
}
