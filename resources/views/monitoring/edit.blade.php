@extends('layouts.app')

@section('title', 'Edit Monitoring')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Edit Monitoring</h1>

    <form action="{{ route('monitoring.update', $monitoring->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="w-full border px-2 py-1 rounded"
                   value="{{ old('nama_siswa', $monitoring->nama_siswa) }}" required>
            @error('nama_siswa')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Kategori</label>
            <input type="text" name="kategori" class="w-full border px-2 py-1 rounded"
                   value="{{ old('kategori', $monitoring->kategori) }}" required>
            @error('kategori')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Keterangan</label>
            <input type="text" name="keterangan" class="w-full border px-2 py-1 rounded"
                   value="{{ old('keterangan', $monitoring->keterangan) }}" required>
            @error('keterangan')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Poin</label>
            <input type="number" name="poin" class="w-full border px-2 py-1 rounded"
                   value="{{ old('poin', $monitoring->poin) }}" required>
            @error('poin')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>


        <div class="mb-4">
            <label class="block mb-1">jenis</label>
            <input type="text" name="jenis" class="w-full border px-2 py-1 rounded"
                   value="{{ old('jenis', $monitoring->jenis) }}" required>
            @error('jenis')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
        </div>

        <button type="submit" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500">Update</button>
        <a href="{{ route('monitoring.index') }}" class="ml-2 text-gray-700">Batal</a>
    </form>
</div>
@endsection
