@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Prestasi</h1>

    @if(auth()->user()->role == 'GURU_BK')
        <a href="{{ route('prestasi.create') }}" class="btn btn-success mb-3">Tambah Prestasi</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
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
                            <img src="{{ asset('prestasi/'.$p->foto) }}" width="70">
                        @else
                            Tidak ada foto
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('prestasi.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>

                        @if(auth()->user()->role == 'GURU_BK')
                            <a href="{{ route('prestasi.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('prestasi.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
