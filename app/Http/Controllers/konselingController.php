<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KonselingController extends Controller
{
    public function index()
    {
        // tampilkan daftar konseling
        return view('konseling.daftar');
    }

    public function create()
    {
        // form pengajuan konseling
        return view('konseling.pengajuan');
    }

    public function store(Request $request)
    {
        return redirect()->route('konseling.index')
            ->with('success', 'Pengajuan konseling berhasil dikirim!');
    }

    public function show($id)
    {
        // detail konseling
        return view('konseling.detail', compact('id'));
    }

    public function edit($id)
    {
        // kalau nanti mau edit data
        return "Edit konseling ID: " . $id;
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('konseling.index')
            ->with('success', 'Data konseling berhasil diperbarui!');
    }

    public function destroy($id)
    {
        return redirect()->route('konseling.index')
            ->with('success', 'Data konseling berhasil dihapus!');
    }
}
