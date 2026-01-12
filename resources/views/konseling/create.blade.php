@extends('dashboard.menu') {{-- Pastikan mengarah ke layout dashboard agar sidebar muncul --}}

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Ajukan Konseling</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg p-8 max-w-2xl mx-auto">
        <form action="{{ route('konseling.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none" 
                       value="{{ old('nama', auth()->user()->name) }}" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kelas</label>
                    <input type="text" name="kelas" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none" 
                           placeholder="Contoh: 12 RPL 1" value="{{ old('kelas') }}" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nomor Absen</label>
                    <input type="number" name="absen" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none" 
                           value="{{ old('absen') }}" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Masalah yang Ingin Dikonsultasikan</label>
                <textarea name="masalah" 
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none" 
                          rows="4" placeholder="Ceritakan singkat masalahmu..." required>{{ old('masalah') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Rencana Tanggal Pertemuan</label>
                <input type="date" name="tanggal" 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition outline-none" 
                       value="{{ old('tanggal') ?? date('Y-m-d') }}" required>
            </div>

            <div class="pt-4 flex items-center justify-between">
                <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-blue-600 transition font-medium">
                    <i class="fa fa-arrow-left mr-1"></i> Kembali
                </a>
                <button type="submit" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-lg shadow-md transform transition active:scale-95">
                    Kirim Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection