@extends('dashboard.menu') {{-- Ganti layouts.app supaya masuk card tengah --}}

@section('content')

<h1 class="text-2xl font-bold mb-4">Daftar Prestasi</h1> {{-- Judul tetap sama, warna default text hitam --}}
  
@if(auth()->user()->role == 'GURU_BK')
    <a href="{{ route('prestasi.create') }}" class="btn btn-success mb-3">Tambah Prestasi</a> {{-- Tombol sama seperti sebelumnya --}}
@endif

@if(session('success'))
    <div class="alert alert-success mb-3">{{ session('success') }}</div> {{-- Notifikasi sukses tetap sama --}}
@endif

{{-- Card tengah → supaya layout mirip Statistik --}}
<div class="bg-white rounded-xl shadow-lg p-6 max-w-6xl mx-auto overflow-x-auto">

    <table class="table table-bordered w-full"> {{-- Table sama seperti awal, warna border & posisi tidak berubah --}}
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Judul Prestasi</th>
                <th>Tingkat</th>
                <th>Keterangan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($prestasis as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->nama_siswa }}</td>
                    <td>{{ $p->judul_prestasi }}</td>
                    <td>{{ $p->tingkat }}</td>
                    <td>{{ $p->keterangan }}</td>
                    <td>
                        @if($p->foto)
                            <img src="{{ asset('prestasi/'.$p->foto) }}" width="70"> {{-- Foto tetap sama --}}
                        @else
                            Tidak ada foto
                        @endif
                    </td>

                    <td class="flex gap-1">
                        <a href="{{ route('prestasi.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a> {{-- Tombol Detail --}}
                        
                        @if(auth()->user()->role == 'GURU_BK')
                            <a href="{{ route('prestasi.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a> {{-- Tombol Edit --}}
                            
                            <form action="{{ route('prestasi.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button> {{-- Tombol Hapus --}}
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div> {{-- Akhir card tengah --}}

@endsection
