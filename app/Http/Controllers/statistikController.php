<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        $kategori = DB::table('pelanggaran')
            ->select('kategori', DB::raw('COUNT(*) as total'))
            ->groupBy('kategori')
            ->get();

        $topPelanggaran = DB::table('pelanggaran')
            ->select('deskripsi', DB::raw('COUNT(*) as total'))
            ->groupBy('deskripsi')
            ->orderByDesc('total')
            ->limit(5)
            ->get();

        $kelas = DB::table('pelanggaran')
            ->join('siswa', 'pelanggaran.siswa_id', '=', 'siswa.id')
            ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
            ->select('kelas.nama_kelas', DB::raw('COUNT(pelanggaran.id) as total'))
            ->groupBy('kelas.nama_kelas')
            ->get();

        $trend = DB::table('pelanggaran')
            ->select(DB::raw("DATE_FORMAT(tanggal, '%Y-%m') as bulan"), DB::raw('COUNT(*) as total'))
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return view('statistik.statistik', compact('kategori', 'topPelanggaran', 'kelas', 'trend'));

    }
}
