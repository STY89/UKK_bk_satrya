@extends('dashboard.menu') {{-- layout masuk card tengah --}}

@section('content')

<h1 class="text-2xl font-bold mb-4">Daftar Konseling</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

{{-- Card Tengah --}}
<div class="bg-white rounded-xl shadow-lg p-6 max-w-6xl mx-auto overflow-x-auto">

    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-center">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Kelas</th>
                <th class="border px-4 py-2">Absen</th>
                <th class="border px-4 py-2">Masalah</th>
                <th class="border px-4 py-2">Tanggal pertemuan</th>
                <th class="border px-4 py-2">Status</th>
                @if(Auth::user()->role === 'GURU_BK')
                <th class="border px-4 py-2">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($data as $i => $k)
            <tr class="{{ $k->status == 'disetujui' ? 'bg-green-100' : '' }}">
                <td class="border px-4 py-2">{{ $i + 1 }}</td>

                {{-- Nama Siswa scrollable --}}
                <td class="border px-4 py-2 p-0">
                    <div class="max-h-32 overflow-y-auto whitespace-nowrap text-left px-2 py-1">
                        {{ $k->nama }}
                    </div>
                </td>

                <td class="border px-4 py-2">{{ $k->kelas }}</td>
                <td class="border px-4 py-2">{{ $k->absen }}</td>

                <td class="border px-4 py-2">
                    @if(Auth::user()->role === 'GURU_BK')
                        {{ $k->masalah }}
                    @else
                        -
                    @endif
                </td>

                <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($k->tanggal)->format('d-m-Y') }}</td>

                <td class="border px-4 py-2">
                    @if($k->status == 'pending')
                        <span class="badge bg-warning">Pending</span>
                    @elseif($k->status == 'disetujui')
                        <span class="badge bg-success">Disetujui</span>
                    @endif
                </td>

                @if(Auth::user()->role === 'GURU_BK')
                <td class="border px-4 py-2">
                    <div class="flex flex-col gap-1">
                        <a href="{{ route('konseling.detail', $k->id) }}" class="btn btn-info btn-sm">Detail</a>
                        @if($k->status == 'pending')
                        <form action="{{ route('konseling.setujui', $k->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Setujui konseling ini?')">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                        </form>
                        @endif
                    </div>
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="{{ Auth::user()->role === 'GURU_BK' ? 8 : 7 }}" class="text-center">
                    Belum ada data konseling
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div> {{-- Akhir card tengah --}}

<a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded-lg hover:bg-blue-100 transition mt-4">dashboard</a>

@endsection
