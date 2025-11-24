@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Prestasi</h1>
    <a href="{{ route('prestasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="card p-3 mb-3">
        <p><strong>Nama Siswa:</strong> {{ $prestasi->nama_siswa }}</p>
        <p><strong>Judul Prestasi:</strong> {{ $prestasi->judul_prestasi }}</p>
        <p><strong>Deskripsi:</strong> {{ $prestasi->tingkat }}</p>
        <p><strong>Pesan / Keterangan:</strong> {{ $prestasi->keterangan }}</p>

        @if($prestasi->foto)
            <p>
                <strong>Foto Prestasi:</strong><br>
                <img src="{{ asset('assets/prestasi/'.$prestasi->foto) }}" alt="Foto Prestasi" width="250">
            </p>
        @endif
    </div>

    @if(auth()->user()->role == 'GURU_BK')
        <div class="mt-3">
            <a href="{{ route('prestasi.edit', $prestasi->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('prestasi.destroy', $prestasi->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
            </form>
        </div>
    @endif
</div>
@endsection
