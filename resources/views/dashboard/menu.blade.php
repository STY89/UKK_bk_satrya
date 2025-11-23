<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard BK Sekolah</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-100 font-[Poppins] text-gray-800">

  <!-- Header Sekolah -->
  <header class="bg-blue-700 text-white shadow-lg py-4 px-8 flex justify-between items-center">
    <div class="flex items-center space-x-3">
      <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" alt="Logo Sekolah" class="w-10 h-10">
      <div>
        <h1 class="text-xl font-bold">SMK Cerdas Bangsa</h1>
        <p class="text-sm text-blue-100">Dashboard Bimbingan Konseling</p>
      </div>
    </div>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md transition">
        🔒 Logout
      </button>
    </form>
  </header>

  <!-- Layout -->
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg border-r border-gray-200 p-6">
      <nav class="space-y-3">
       <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">🏠 Dashboard</a>

@if(Auth::user()->role === 'GURU_BK')
    <!-- Menu Admin -->
    <a href="{{ route('monitoring.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">👥 Monitoring Siswa</a>
    <a href="{{ route('prestasi.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">🎖️ Prestasi</a>
    <a href="{{ route('konseling.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">💬 Konseling</a>
    <a href="{{ route('statistik.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">📊 Statistik</a>
@else
    <!-- Menu User (read-only) -->
    <a href="{{ route('monitoring.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">👀 Lihat Monitoring</a>
    <a href="{{ route('prestasi.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">👀 Lihat Prestasi</a>
    <a href="{{ route('konseling.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">💬 Lihat Konseling</a>
    <a href="{{ route('statistik.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">📊 Lihat Statistik</a>
@endif

      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
      <h2 class="text-2xl font-bold text-blue-700 mb-4">Halo, {{ auth()->user()->name }} 👋</h2>
      <p class="text-gray-600 mb-8">Selamat datang di sistem Bimbingan Konseling sekolah.</p>

      <!-- GRID MENU (Card Navigasi) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <a href="{{ route('monitoring.index') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-blue-500 to-blue-700">
          <div class="text-4xl mb-4">📖</div>
          <h2 class="text-xl font-semibold mb-2">Monitoring Siswa</h2>
          <p class="text-white text-sm">Lihat data siswa secara keseluruhan</p>
        </a>

        <a href="{{ route('prestasi.index') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-green-500 to-green-700">
          <div class="text-4xl mb-4">🎖️</div>
          <h2 class="text-xl font-semibold mb-2">Prestasi</h2>
          <p class="text-white text-sm">Lihat daftar prestasi siswa</p>
        </a>

        <a href="{{ route('konseling.index') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-purple-500 to-purple-700">
          <div class="text-4xl mb-4">💬</div>
          <h2 class="text-xl font-semibold mb-2">Daftar Konseling</h2>
          <p class="text-white text-sm">Lihat pengajuan konseling</p>
        </a>

        @if(Auth::user()->role === 'GURU_BK')
        <a href="{{ route('konseling.create') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-pink-500 to-pink-700">
          <div class="text-4xl mb-4">➕</div>
          <h2 class="text-xl font-semibold mb-2">Ajukan Konseling</h2>
          <p class="text-white text-sm">Buat pengajuan konseling baru</p>
        </a>
        @endif

        <a href="{{ route('statistik.index') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-orange-500 to-orange-700">
          <div class="text-4xl mb-4">📊</div>
          <h2 class="text-xl font-semibold mb-2">Statistik</h2>
          <p class="text-white text-sm">Lihat grafik & data statistik</p>
        </a>
      </div>

      <!-- Card Statistik Singkat -->
      <section class="grid md:grid-cols-3 gap-6 mt-10">
        <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-md transition">
          <h3 class="text-lg font-semibold text-blue-600 mb-2">Jumlah Siswa</h3>
          <p class="text-3xl font-bold text-gray-800">120</p>
        </div>

        <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-md transition">
          <h3 class="text-lg font-semibold text-blue-600 mb-2">Sesi Konseling</h3>
          <p class="text-3xl font-bold text-gray-800">35</p>
        </div>

        <div class="bg-white border border-gray-200 p-6 rounded-xl shadow hover:shadow-md transition">
          <h3 class="text-lg font-semibold text-blue-600 mb-2">Laporan Selesai</h3>
          <p class="text-3xl font-bold text-gray-800">17</p>
        </div>
      </section>

      <!-- Contoh Tabel CRUD Role-based -->
      <section class="mt-10">
        <h3 class="text-xl font-bold mb-4">Daftar Siswa</h3>
        <table class="w-full text-left border">
          <thead class="bg-gray-200">
            <tr>
              <th class="p-2">Nama</th>
              <th class="p-2">Kelas</th>
              <th class="p-2">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($siswa as $s)
            <tr class="border-t">
              <td class="p-2">{{ $s->name }}</td>
              <td class="p-2">{{ $s->kelas->nama_kelas ?? '-' }}</td>
              <td class="p-2 space-x-2">
                <a href="{{ route('siswa.show', $s->id) }}" class="text-blue-600 hover:underline">Detail</a>

                @if(Auth::user()->role === 'GURU_BK')
                  <a href="{{ route('siswa.edit', $s->id) }}" class="text-green-600 hover:underline">Edit</a>
                  <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Yakin hapus?')">Hapus</button>
                  </form>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </section>

    </main>
  </div>
</body>
</html>