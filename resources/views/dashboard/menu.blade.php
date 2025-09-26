@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-600 to-blue-500 p-6">
    <div class="w-full max-w-5xl">
        <h1 class="text-3xl font-bold text-white text-center mb-8">
            Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Card contoh -->
            <a href="#"
               class="dashboard-card gradient-blue">
                <div class="text-4xl mb-4">📖</div>
                <h2 class="text-xl font-semibold mb-2">Monitoring Siswa</h2>
                <p class="text-white text-sm">Lihat data siswa secara keseluruhan</p>
            </a>

            <a href="{{ route('prestasi.index') }}" class="dashboard-card gradient-green">
                <div class="text-4xl mb-4">🎖️</div>
                <h2 class="text-xl font-semibold mb-2">Prestasi</h2>
                <p class="text-white text-sm">Lihat daftar prestasi siswa</p>
            </a>

            <a href="{{ route('konseling.index') }}" class="dashboard-card gradient-purple">
                <div class="text-4xl mb-4">💬</div>
                <h2 class="text-xl font-semibold mb-2">Daftar Konseling</h2>
                <p class="text-white text-sm">Lihat pengajuan konseling</p>
            </a>

            <a href="{{ route('konseling.create') }}" class="dashboard-card gradient-pink">
                <div class="text-4xl mb-4">➕</div>
                <h2 class="text-xl font-semibold mb-2">Ajukan Konseling</h2>
                <p class="text-white text-sm">Buat pengajuan konseling baru</p>
            </a>

            <a href="{{ route('statistik.index') }}" class="dashboard-card gradient-orange">
                <div class="text-4xl mb-4">📊</div>
                <h2 class="text-xl font-semibold mb-2">Statistik</h2>
                <p class="text-white text-sm">Lihat grafik & data statistik</p>
            </a>
        </div>
    </div>
</div>

<style>
.dashboard-card {
    background: white;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.3s, box-shadow 0.3s;
}

.dashboard-card:hover {
    transform: translateY(-8px) scale(1.03);
    box-shadow: 0 20px 35px rgba(0,0,0,0.3);
}

/* Gradient tiap card */
.gradient-blue { background: linear-gradient(135deg, #3b82f6, #60a5fa); color: white; }
.gradient-green { background: linear-gradient(135deg, #16a34a, #4ade80); color: white; }
.gradient-purple { background: linear-gradient(135deg, #8b5cf6, #a78bfa); color: white; }
.gradient-pink { background: linear-gradient(135deg, #ec4899, #f472b6); color: white; }
.gradient-orange { background: linear-gradient(135deg, #f97316, #fb923c); color: white; }

h2 { color: white; }
p { color: rgba(255, 255, 255, 0.85); }
</style>
@endsection
