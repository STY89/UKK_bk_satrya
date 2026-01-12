<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\User;

class MonitoringController extends Controller
{
    public function index()
{
    $user = auth()->user();

    if ($user->role === 'SISWA') {
        // Menggunakan trim untuk membersihkan spasi tak terlihat
        $namaUser = trim($user->name);
        $monitorings = Pelanggaran::where('user_id', $user->id)
                        ->orWhere('nama_siswa', 'LIKE', '%' . $namaUser . '%')
                        ->latest()
                        ->get()
                        ->groupBy('nama_siswa');
    } else {
        $monitorings = Pelanggaran::with('user')
                        ->latest()
                        ->get()
                        ->groupBy('nama_siswa');
    }

    return view('monitoring.index', compact('monitorings'));
}

    public function create()
    {
        if (auth()->user()->role === 'SISWA') {
            abort(403, 'Anda tidak memiliki akses!');
        }

        $siswa = User::where('role', 'SISWA')->get();
        return view('monitoring.create', compact('siswa'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role === 'SISWA') {
            abort(403, 'Anda tidak memiliki akses!');
        }

        $request->validate([
            'nama_siswa'    => 'required|string',
            'jenis_kelamin' => 'required|string',
            'kategori'      => 'required|string',
            'keterangan'    => 'required|string',
            'poin'          => 'required|integer',
            'jenis'         => 'required|string',
        ]);

        $user = User::where('name', $request->nama_siswa)->first();

        Pelanggaran::create([
            'user_id'       => $user->id ?? null,
            'nama_siswa'    => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kategori'      => $request->kategori,
            'keterangan'    => $request->keterangan,
            'poin'          => $request->poin,
            'status'        => 'Belum Ditindak',
            'jenis'         => $request->jenis,
        ]);

        return redirect()->route('monitoring.index')->with('success', 'Data monitoring berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (auth()->user()->role === 'SISWA') {
            abort(403, 'Anda tidak memiliki akses!');
        }

        $monitoring = Pelanggaran::findOrFail($id);
        $siswa = User::where('role', 'SISWA')->get();
        return view('monitoring.edit', compact('monitoring', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->role === 'SISWA') {
            abort(403, 'Anda tidak memiliki akses!');
        }

        $request->validate([
            'nama_siswa'    => 'required|string',
            'jenis_kelamin' => 'required|string',
            'kategori'      => 'required|string',
            'keterangan'    => 'required|string',
            'poin'          => 'required|integer',
            'jenis'         => 'required|string',
        ]);

        $monitoring = Pelanggaran::findOrFail($id);
        $user = User::where('name', $request->nama_siswa)->first();

        $monitoring->update([
            'user_id'       => $user->id ?? $monitoring->user_id,
            'nama_siswa'    => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kategori'      => $request->kategori,
            'keterangan'    => $request->keterangan,
            'poin'          => $request->poin,
            'jenis'         => $request->jenis,
        ]);

        return redirect()->route('monitoring.index')->with('success', 'Data monitoring berhasil diupdate!');
    }

    public function destroy($id)
    {
        if (auth()->user()->role === 'SISWA') {
            abort(403, 'Anda tidak memiliki akses!');
        }

        Pelanggaran::findOrFail($id)->delete();
        return back()->with('success', 'Data monitoring berhasil dihapus!');
    }
}
