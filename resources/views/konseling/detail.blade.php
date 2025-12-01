@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Konseling</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ $konseling->nama }}</p>
            <p><strong>Kelas:</strong> {{ $konseling->kelas }}</p>
            <p><strong>Absen:</strong> {{ $konseling->absen }}</p>
            <p><strong>Masalah:</strong> {{ $konseling->masalah }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($konseling->tanggal)->format('d-m-Y') }}</p>
            <p><strong>Status:</strong> 
                @if($konseling->status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                @elseif($konseling->status == 'disetujui')
                    <span class="badge bg-success">Disetujui</span>
                @endif
            </p>
        </div>
    </div>

    <a href="{{ route('konseling.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
