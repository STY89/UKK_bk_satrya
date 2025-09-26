<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    // Menampilkan daftar prestasi
    public function index()
    {
        // Dummy data dulu (belum dari database)
        $prestasi = [
            ['id' => 1, 'nama' => 'Andi', 'prestasi' => 'Juara 1 Olimpiade Matematika'],
            ['id' => 2, 'nama' => 'Budi', 'prestasi' => 'Juara 2 Lomba Futsal'],
            ['id' => 3, 'nama' => 'Citra', 'prestasi' => 'Juara 3 Lomba Pidato'],
        ];

        return view('prestasi.daftar', compact('prestasi'));
    }

    // Form tambah prestasi
    public function create()
    {
        return view('prestasi.form');
    }

    // Simpan data prestasi baru
    public function store(Request $request)
    {
        // nanti logika simpan ke database
        return redirect()->route('prestasi.view')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    // Detail prestasi
    public function show($id)
    {
        return view('prestasi.detail', ['id' => $id]);
    }

    // Edit prestasi
    public function edit($id)
    {
        return view('prestasi.edit', ['id' => $id]);
    }

    public function update(Request $request, $id)
    {
        // nanti logika update database
        return redirect()->route('prestasi.view')->with('success', 'Prestasi berhasil diupdate!');
    }

    public function destroy($id)
    {
        // nanti logika hapus database
        return redirect()->route('prestasi.view')->with('success', 'Prestasi berhasil dihapus!');
    }
}
