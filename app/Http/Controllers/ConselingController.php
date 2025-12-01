<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use Illuminate\Http\Request;

class ConselingController extends Controller
{
    // Halaman daftar konseling (guru BK)
    public function index()
    {
        $data = Konseling::orderBy('created_at', 'DESC')->get();
        return view('konseling.index', compact('data'));
    }

    // Form pengajuan konseling (siswa)
   public function create()
{
    $userName = auth()->user()->name;
    $konselingSaya = Konseling::where('nama', $userName)
                        ->orderBy('created_at', 'DESC')
                        ->get();

    return view('konseling.create', compact('konselingSaya'));
}


    // Simpan ajuan konseling siswa
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:10',
            'absen' => 'required|integer',
            'masalah' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        Konseling::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'absen' => $request->absen,
            'masalah' => $request->masalah,
            'tanggal' => $request->tanggal,
            'status' => 'pending', // default status sama dengan migration
        ]);

        return redirect()->back()->with('success', 'Ajuan konseling berhasil dikirim!');
    }

    // Detail konseling (guru BK & siswa)
    public function detail($id)
    {
        $konseling = Konseling::findOrFail($id);
        return view('konseling.detail', compact('konseling'));
    }

    // Setujui konseling (hanya guru BK)
    public function setujui($id)
    {
        $k = Konseling::findOrFail($id);
        $k->update(['status' => 'disetujui']);

        return redirect()->back()->with('success', 'Konseling telah disetujui!');
    }
}
