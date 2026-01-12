<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SiswaUserSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil nama siswa unik dari tabel pelanggarans
        $namaSiswa = DB::table('pelanggarans')
            ->select('nama_siswa')
            ->whereNotNull('nama_siswa')
            ->distinct()
            ->pluck('nama_siswa');

        foreach ($namaSiswa as $nama) {

            // Cegah duplikat user
            $cek = User::where('name', $nama)->exists();

            if (!$cek) {
                User::create([
                    'name' => $nama,
                    'email' => strtolower(str_replace(' ', '.', $nama)) . '@siswa.sch.id',
                    'role' => 'SISWA',
                    'password' => Hash::make('password123'),
                ]);
            }
        }
    }
}
