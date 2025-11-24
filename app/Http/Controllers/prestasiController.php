<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Halaman daftar prestasi
    public function index()
    {
        $prestasis = Prestasi::latest()->get();
        return view('prestasi.index', compact('prestasis'));
    }

    // Form tambah prestasi
    public function create()
    {
        return view('prestasi.create');
    }

    // Simpan prestasi baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'judul_prestasi' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $fotoName = null;
        if($request->hasFile('foto')){
            $fotoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('assets/prestasi'), $fotoName);
        }

        Prestasi::create([
            'nama_siswa' => $request->nama_siswa,
            'judul_prestasi' => $request->judul_prestasi,
            'tingkat' => $request->tingkat,
            'foto' => $fotoName,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    // Form edit prestasi
    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasi.edit', compact('prestasi'));
    }

    // Update prestasi
    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'judul_prestasi' => 'required|string|max:255',
            'tingkat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $fotoName = $prestasi->foto;
        if($request->hasFile('foto')){
            // hapus foto lama
            if($fotoName && file_exists(public_path('assets/prestasi/'.$fotoName))){
                unlink(public_path('assets/prestasi/'.$fotoName));
            }
            $fotoName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('assets/prestasi'), $fotoName);
        }

        $prestasi->update([
            'nama_siswa' => $request->nama_siswa,
            'judul_prestasi' => $request->judul_prestasi,
            'tingkat' => $request->tingkat,
            'foto' => $fotoName,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    // Hapus prestasi
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        if($prestasi->foto && file_exists(public_path('assets/prestasi/'.$prestasi->foto))){
            unlink(public_path('assets/prestasi/'.$prestasi->foto));
        }
        $prestasi->delete();

        return redirect()->route('prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }

    // Detail prestasi
    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasi.show', compact('prestasi'));
    }
}
