@extends('layouts.app')

@section('title', 'Data Monitoring')

@section('content')
<div class="container mx-auto p-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Monitoring</h1>

        @if(auth()->user()->role != 'SISWA')
        <a href="{{ route('monitoring.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Monitoring</a>
        @endif
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">No</th>
                <th class="border px-4 py-2">Nama Siswa</th>
                <th class="border px-4 py-2">Kategori</th>
                <th class="border px-4 py-2">Keterangan</th>
                <th class="border px-4 py-2">Poin</th>
                @if(auth()->user()->role != 'SISWA')
                <th class="border px-4 py-2">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @forelse($monitorings as $index => $monitor)
            <tr class="text-center">
                <td class="border px-4 py-2">{{ $index + 1 }}</td>
                <td class="border px-4 py-2">{{ $monitor->nama_siswa ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $monitor->kategori }}</td>
                <td class="border px-4 py-2">{{ $monitor->keterangan }}</td>
                <td class="border px-4 py-2">{{ $monitor->poin }}</td>

                @if(auth()->user()->role != 'SISWA')
                <td class="border px-4 py-2">
                    <a href="{{ route('monitoring.edit', $monitor->id) }}" class="bg-yellow-400 px-2 py-1 rounded hover:bg-yellow-500 text-white">Edit</a>
                    <form action="{{ route('monitoring.destroy', $monitor->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 px-2 py-1 rounded hover:bg-red-600 text-white">Hapus</button>
                    </form>
                </td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="{{ auth()->user()->role == 'SISWA' ? 5 : 6 }}" class="text-center">Belum ada data monitoring</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
