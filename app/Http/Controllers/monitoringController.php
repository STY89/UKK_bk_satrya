<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;

class MonitoringController extends Controller
{
    // F. MonitoringController.php - method index() (PERBAIKAN)
public function index()
{
    // Cek peran user yang sedang login
    if(auth()->user()->role == 'SISWA'){
        // Jika Siswa, tampilkan SEMUA data pelanggaran, 
        // sehingga mereka bisa melihat nama-nama yang diinput Admin.
        $monitorings = Pelanggaran::latest()->get(); 
        
        // Catatan: Jika Anda hanya ingin siswa melihat pelanggaran yang 'umum' 
        // (yang user_id-nya NULL), gunakan:
        // $monitorings = Pelanggaran::whereNull('user_id')->orWhere('user_id', auth()->id())->latest()->get();
        
    } else {
        // Untuk Admin/BK, tetap tampilkan SEMUA data
        $monitorings = Pelanggaran::latest()->get();
    }

    return view('monitoring.index', compact('monitorings'));
}

    public function create()
    {
        if(auth()->user()->role == 'SISWA'){
            abort(403, 'Anda tidak memiliki akses!');
        }
        return view('monitoring.create');
    }

    public function store(Request $request)
    {
        if(auth()->user()->role == 'SISWA'){
            abort(403, 'Anda tidak memiliki akses!');
        }

        $request->validate([
            'nama_siswa' => 'required|array',
            'nama_siswa.*'=> 'required|string',
            'kategori'  => 'required|string',
            'keterangan'=> 'required|string',
            'poin'      => 'required|integer',
            'jenis'     => 'required|string',
        ]);

        foreach($request->nama_siswa as $namaSiswa){
    Pelanggaran::create([
        'user_id'    => null,
        'nama_siswa' => $namaSiswa,
        'kategori'   => $request->kategori,
        'keterangan' => $request->keterangan,
        'poin'       => $request->poin,
        'status'     => 'Belum Ditindak',
        'jenis'      => $request->jenis,
    ]);
}


        return redirect()->route('monitoring.index')
            ->with('success', 'Data monitoring berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if(auth()->user()->role == 'SISWA'){
            abort(403, 'Anda tidak memiliki akses!');
        }
        $monitoring = Pelanggaran::findOrFail($id);
        return view('monitoring.edit', compact('monitoring'));
    }

    public function update(Request $request, $id)
    {
        if(auth()->user()->role == 'SISWA'){
            abort(403, 'Anda tidak memiliki akses!');
        }

        $request->validate([
            'nama_siswa'=> 'required|string',
            'kategori'  => 'required|string',
            'keterangan'=> 'required|string',
            'poin'      => 'required|integer',
            'jenis'     => 'required|string',
        ]);

        $monitoring = Pelanggaran::findOrFail($id);
        $monitoring->update([
            'nama_siswa'=> $request->nama_siswa,
            'kategori'  => $request->kategori,
            'keterangan'=> $request->keterangan,
            'poin'      => $request->poin,
            'jenis'      => $request->jenis,
        ]);

        return redirect()->route('monitoring.index')
            ->with('success', 'Data monitoring berhasil diupdate!');
    }

    public function destroy($id)
    {
        if(auth()->user()->role == 'SISWA'){
            abort(403, 'Anda tidak memiliki akses!');
        }
        Pelanggaran::findOrFail($id)->delete();
        return back()->with('success', 'Data monitoring berhasil dihapus!');
    }
}
