@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Form Pengajuan Konseling</h1>

    <form action="{{ route('konseling.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Pilih jenis konseling -->
        <div>
            <label class="block font-medium">Jenis Konseling</label>
            <select name="jenis" class="w-full border rounded p-2">
                <option value="offline">Offline (Tatap Muka)</option>
                <option value="online">Online (WhatsApp)</option>
            </select>
        </div>

        <!-- Jadwal untuk offline -->
        <div>
            <label class="block font-medium">Jadwal Konseling (Jika Offline)</label>
            <input type="datetime-local" name="jadwal" class="w-full border rounded p-2">
        </div>

        <!-- Nomor WA untuk online -->
        <div>
            <label class="block font-medium">Nomor WA Guru BK (Jika Online)</label>
            <input type="text" name="wa" class="w-full border rounded p-2" placeholder="+62xxx">
        </div>

        <!-- Tombol submit -->
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Kirim Pengajuan
            </button>
        </div>
    </form>
</div>
@endsection
