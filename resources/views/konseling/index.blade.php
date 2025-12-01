@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Konseling</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Absen</th>
                <th>Masalah</th>
                <th>Tanggal</th>
                <th>Status</th>
                @if(Auth::user()->role === 'GURU_BK')
                <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($data as $i => $k)
            <tr class="{{ $k->status == 'disetujui' ? 'bg-green-100' : '' }}">
                <td>{{ $i+1 }}</td>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->kelas }}</td>
                <td>{{ $k->absen }}</td>
                <td>
                    @if(Auth::user()->role === 'GURU_BK')
                        {{ $k->masalah }}
                    @else
                        -
                    @endif
                </td>
                <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d-m-Y') }}</td>
                <td>
                    @if($k->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($k->status == 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @endif
                </td>
                @if(Auth::user()->role === 'GURU_BK')
                <td>
                    <a href="{{ route('konseling.detail', $k->id) }}" class="btn btn-info btn-sm mb-1">Detail</a>
                    @if($k->status == 'pending')
                    <form action="{{ route('konseling.setujui', $k->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button class="btn btn-success btn-sm" onclick="return confirm('Setujui konseling ini?')">Setujui</button>
                    </form>
                    @endif
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
