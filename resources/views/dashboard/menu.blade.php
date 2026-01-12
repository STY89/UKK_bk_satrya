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
      <img src="{{ asset('image/antartika logo.png') }}" alt="Logo Sekolah" class="w-10 h-10">
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
          <a href="{{ route('bk.ai') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">🤖 BK AI</a>
        @else
          <a href="{{ route('monitoring.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">👀 Lihat Monitoring</a>
          <a href="{{ route('prestasi.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">👀 Lihat Prestasi</a>
          <a href="{{ route('konseling.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">💬 Konseling</a>
          <a href="{{ route('konseling.create') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">💬 Konseling pengajuan</a>
          <a href="{{ route('statistik.index') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">📊 Lihat Statistik</a>
          <a href="{{ route('bk.ai') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition">🤖 BK AI</a>
        @endif
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
      <!-- Main Content -->


 <div class="bg-white rounded-xl shadow-lg p-6 min-h-[400px] w-full">
    {{-- ISI HALAMAN AKAN MASUK DI SINI --}}
    @yield('content')

  </div>

  <footer class="bg-gray-200 text-gray-800 text-center py-8 mt-12 rounded-lg shadow-inner">
    <p class="mb-2 font-medium">
      Selamat datang di website SMK ANTARTIKA 1 SIDOARJO.
    </p>
    <p class="mb-2 font-medium">
      Mencetak generasi unggul, berakhlak mulia, dan siap bersaing di era global.
    </p>
    <p class="font-medium">
      Pendidikan berkualitas untuk masa depan gemilang.
    </p>
  </footer>





      <footer class="bg-gray-200 text-gray-800 text-center py-8 mt-12 rounded-lg shadow-inner">
        <p class="mb-2 font-medium">Selamat datang di website SMK ANTARTIKA 1 SIDOARJO. Semoga informasi yang kami sajikan bermanfaat bagi siswa, orang tua, dan guru.</p>
        <p class="mb-2 font-medium">Mencetak generasi unggul, berakhlak mulia, dan siap bersaing di era global.</p>
        <p class="font-medium">Pendidikan berkualitas untuk masa depan gemilang.</p>
      </footer>

    </main>
  </div>

</body>
</html>
