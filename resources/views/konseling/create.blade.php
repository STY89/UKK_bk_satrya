@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajukan Konseling</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('konseling.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}" required>
        </div>

        <div class="mb-3">
            <label>Absen</label>
            <input type="number" name="absen" class="form-control" value="{{ old('absen') }}" required>
        </div>

        <div class="mb-3">
            <label>Masalah</label>
            <textarea name="masalah" class="form-control" rows="4" required>{{ old('masalah') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') ?? date('Y-m-d') }}" required>
        </div>

        <button class="btn btn-primary">Kirim Pengajuan</button>
    </form>
</div>
@endsection
