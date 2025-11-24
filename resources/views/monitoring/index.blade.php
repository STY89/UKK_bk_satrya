@extends('layouts.app')

@section('title', 'Data Monitoring')

{{-- Tambah Font Awesome untuk ikon --}}
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

{{-- ============================= --}}
{{--      CSS TAMBAHAN DI SINI     --}}
{{-- ============================= --}}
<style>
    .container {
        max-width: 1200px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        border: 1px solid #ddd;
        padding: 10px;
    }

    table tr:hover {
        background: #f0f8ff;
    }

    /* Tombol edit */
    .btn-edit {
        background-color: #f1c40f !important;
        padding: 6px 12px;
        border-radius: 6px;
        color: white !important;
        margin-right: 6px;
        display: inline-block;
    }
    .btn-edit:hover {
        background-color: #d4ac0d !important;
    }

    /* Tombol delete */
    .btn-delete {
        background-color: #e74c3c !important;
        padding: 6px 12px;
        border-radius: 6px;
        color: white !important;
        display: inline-block;
    }
    .btn-delete:hover {
        background-color: #c0392b !important;
    }

    /* Tombol tambah monitoring */
    .btn-add {
        background-color: #3498db !important;
        padding: 8px 14px;
        border-radius: 6px;
        color: white !important;
        font-weight: bold;
    }
    .btn-add:hover {
        background-color: #2980b9 !important;
    }
    .btn-group-row {
    display: flex;
    justify-content: space-between; /* Edit kiri — Delete kanan */
    align-items: center;
    gap: 10px;
}

</style>

@section('content')
<div class="container mx-auto p-4">

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Monitoring</h1>

        @if(auth()->user()->role != 'SISWA')
        <a href="{{ route('monitoring.create') }}" class="btn-add">
            <i class="fa fa-plus"></i> Tambah Monitoring
        </a>
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
                <th class="border px-4 py-2">Jenis kelamin</th>
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
                <td class="border px-4 py-2">{{ $monitor->jenis }}</td>

                @if(auth()->user()->role != 'SISWA')
       <td class="border px-4 py-2">

    <div class="btn-group-row">
        {{-- Tombol Edit --}}
        <a href="{{ route('monitoring.edit', $monitor->id) }}" class="btn-edit">
            <i class="fa fa-pencil-alt"></i> Edit
        </a>

        {{-- Tombol Delete --}}
        <form action="{{ route('monitoring.destroy', $monitor->id) }}"
              method="POST"
              class="inline-block"
              onsubmit="return confirm('Yakin hapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">
                <i class="fa fa-trash"></i> Delete
            </button>
        </form>
    </div>

</td>
                @endif
            </tr>
            @empty
            <tr>
                <td colspan="{{ auth()->user()->role == 'SISWA' ? 5 : 7 }}" class="text-center">
                    Belum ada data monitoring
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
