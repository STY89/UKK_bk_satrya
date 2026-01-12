<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class PelanggaranSeeder extends Seeder
{
    public function run()
    {
        $kategoriList = [
            "Akademik", "Disiplin", "Kebersihan", "Sopan Santun", 
            "Kehadiran", "Perilaku", "Kerja Sama", "Tanggung Jawab",
            "Kedisiplinan", "Etika"
        ];

        $keteranganList = [
            "Datang terlambat", "Tidak mengerjakan tugas", "Merokok di area sekolah",
            "Berteriak di kelas", "Membuang sampah sembarangan", "Memakai seragam tidak rapi",
            "Mengganggu teman", "Tidak mengikuti upacara", "Menggunakan HP di kelas",
            "Tidak menghormati guru"
        ];

        $jenisList = ["Ringan", "Sedang", "Berat"];

        // ambil semua siswa
        $siswa = User::where('role', 'SISWA')->get();

        foreach ($siswa as $s) {
            // random jumlah pelanggaran per siswa: 1–5
            $jumlah = rand(1, 5);

            for ($i = 0; $i < $jumlah; $i++) {
                DB::table('pelanggarans')->insert([
                    'user_id' => $s->id,
                    'jenis' => $jenisList[array_rand($jenisList)],
                    'status' => 'Belum Selesai',
                    'kategori' => $kategoriList[array_rand($kategoriList)],
                    'keterangan' => $keteranganList[array_rand($keteranganList)],
                    'jenis_kelamin' => $s->jenis_kelamin ?? 'Laki-laki',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
