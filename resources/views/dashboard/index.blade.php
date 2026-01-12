@extends('layouts.dashboard')

@section('content')
<h2 class="text-2xl font-bold text-blue-700 mb-4">
  Halo, {{ auth()->user()->name }} 👋
</h2>

<p class="text-gray-600 mb-4">
  Selamat datang di sistem Bimbingan Konseling sekolah.
</p>

@if(auth()->user()->role === 'GURU_BK')
  <p>Anda login sebagai <strong>Guru BK</strong>.</p>
@else
  <p>Anda login sebagai <strong>Siswa</strong>.</p>
@endif
@endsection
