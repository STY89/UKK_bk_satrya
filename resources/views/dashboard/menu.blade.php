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
        <h1 class="text-xl font-bold">SMK ANTARTIKA 1 SIDOARJO</h1>
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
          <a href="{{ route('monitoring.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">👥 Monitoring Siswa</a>
          <a href="{{ route('prestasi.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">🎖️ Prestasi</a>
          <a href="{{ route('konseling.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">💬 Konseling</a>
          <a href="{{ route('statistik.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">📊 Statistik</a>
        @else
          <a href="{{ route('monitoring.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">👀 Lihat Monitoring</a>
          <a href="{{ route('prestasi.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">👀 Lihat Prestasi</a>
          <a href="{{ route('konseling.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">💬 Konseling</a>
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

    <!-- Monitoring Siswa -->
    <a href="{{ route('monitoring.index') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-blue-500 to-blue-700">
        <div class="text-4xl mb-4">📖</div>
        <h2 class="text-xl font-semibold mb-2">Monitoring Siswa</h2>
        <p class="text-white text-sm">Lihat data siswa secara keseluruhan</p>
    </a>

    <!-- Prestasi -->
    <a href="{{ route('prestasi.index') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-green-500 to-green-700">
        <div class="text-4xl mb-4">🎖️</div>
        <h2 class="text-xl font-semibold mb-2">Prestasi</h2>
        <p class="text-white text-sm">Lihat daftar prestasi siswa</p>
    </a>

    <!-- Daftar Konseling untuk GURU_BK -->
    @if(Auth::user()->role === 'GURU_BK')
        <a href="{{ route('konseling.index') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-purple-500 to-purple-700">
            <div class="text-4xl mb-4">💬</div>
            <h2 class="text-xl font-semibold mb-2">Daftar Konseling</h2>
            <p class="text-white text-sm">Lihat pengajuan konseling</p>
        </a>
        <a href="{{ route('bk.ai') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-purple-500 to-purple-700">
            <div class="text-4xl mb-4">💬</div>
            <h2 class="text-xl font-semibold mb-2">BK AI</h2>
            <p class="text-white text-sm">Curhat dengan AI</p>
        </a>
    @else
        <!-- Untuk SISWA / USER biasa -->
        <a href="{{ route('konseling.create') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-purple-500 to-purple-700">
            <div class="text-4xl mb-4">➕</div>
            <h2 class="text-xl font-semibold mb-2">Ajukan Konseling</h2>
            <p class="text-white text-sm">Buat pengajuan konseling baru</p>
        </a>

        <!-- Tambahkan Daftar Konseling -->
        <a href="{{ route('konseling.index') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-purple-600 to-purple-800">
            <div class="text-4xl mb-4">💬</div>
            <h2 class="text-xl font-semibold mb-2">Daftar Konseling</h2>
            <p class="text-white text-sm">Lihat pengajuan konselingmu</p>
        </a>

        <a href="{{ route('bk.ai') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-purple-700 to-purple-900">
            <div class="text-4xl mb-4">💬</div>
            <h2 class="text-xl font-semibold mb-2">BK AI</h2>
            <p class="text-white text-sm">Curhat dengan AI</p>
        </a>
    @endif

    <!-- Statistik -->
    <a href="{{ route('statistik.index') }}" class="p-6 rounded-xl text-white text-center shadow-md hover:shadow-xl transition bg-gradient-to-br from-orange-500 to-orange-700">
        <div class="text-4xl mb-4">📊</div>
        <h2 class="text-xl font-semibold mb-2">Statistik</h2>
        <p class="text-white text-sm">Lihat grafik & data statistik</p>
    </a>

</div>
 <!-- end grid menu -->

      <!-- Footer -->
      <footer class="bg-gray-200 text-gray-800 text-center py-8 mt-12 rounded-lg shadow-inner">
        <p class="mb-2 font-medium">Selamat datang di website SMK ANTARTIKA 1 SIDOARJO. Semoga informasi yang kami sajikan bermanfaat bagi siswa, orang tua, dan guru.</p>
        <p class="mb-2 font-medium">Mencetak generasi unggul, berakhlak mulia, dan siap bersaing di era global.</p>
        <p class="font-medium">Pendidikan berkualitas untuk masa depan gemilang.</p>
      </footer>

    </main>
  </div>

</body>
</html>
