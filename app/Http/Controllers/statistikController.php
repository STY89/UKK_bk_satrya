<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        // Ambil data pelanggaran dari DB, grup per kategori
       $data = DB::table('pelanggarans')
    ->select('keterangan', DB::raw('SUM(poin) as total_poin'))
    ->groupBy('keterangan')
    ->get();


        // Untuk chart
       $keterangan = $data->pluck('keterangan');   // label chart
        $totals = $data->pluck('total_poin');     // data chart

        // Hitung total semua poin untuk persentase
        $totalSemua = $data->sum('total_poin');
$persentase = $data->map(function($item) use ($totalSemua) {
    return round(($item->total_poin / $totalSemua) * 100, 1);
});


        return view('statistik.index', compact('data', 'keterangan', 'totals', 'persentase'));
    }
}
