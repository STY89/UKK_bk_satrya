<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        // Ambil jumlah pelanggaran per keterangan
        $data = DB::table('pelanggarans')
            ->select('keterangan', DB::raw('COUNT(*) as total'))
            ->groupBy('keterangan')
            ->get();

        // Hitung total semua pelanggaran
        $totalSemua = $data->sum('total');

        // Label chart
        $keterangan = $data->pluck('keterangan');

        // Hitung persentase
        $persentase = $data->map(function ($item) use ($totalSemua) {
            return $totalSemua > 0
                ? round(($item->total / $totalSemua) * 100, 1)
                : 0;
        });

        return view('statistik.index', compact(
            'keterangan',
            'persentase'
        ));
    }
}
