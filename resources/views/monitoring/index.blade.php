@extends('dashboard.menu')

@section('content')
<h1 class="text-2xl font-bold mb-4">Data Monitoring Pelanggaran</h1>

@if(auth()->user()->role != 'SISWA')
    <a href="{{ route('monitoring.create') }}" class="btn-add mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
        <i class="fa fa-plus"></i> Tambah Monitoring
    </a>
@endif

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-lg p-6 max-w-6xl mx-auto mt-4">
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-[#1e40af] text-white text-center">
                    <th class="px-4 py-3 border">No</th>
                    <th class="px-4 py-3 border">Nama Siswa</th>
                    <th class="px-4 py-3 border">Jenis Kelamin</th>
                    <th class="px-4 py-3 border">Daftar Pelanggaran</th>
                    <th class="px-4 py-3 border">Total Poin</th>
                    @if(auth()->user()->role != 'SISWA')
                        <th class="px-4 py-3 border">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @forelse($monitorings as $namaSiswa => $daftarPelanggaran)
                <tr class="hover:bg-gray-50 transition text-center">
                    {{-- 1. Nomor --}}
                    <td class="border px-4 py-2 text-center">{{ $no++ }}</td>
                    
                    {{-- 2. Nama Siswa --}}
                    <td class="border px-4 py-2 text-left font-bold">
                        {{ $namaSiswa }}
                    </td>
                    
                    {{-- 3. Jenis Kelamin --}}
                    <td class="border px-4 py-2 text-center">
                        {{ $daftarPelanggaran->first()->jenis_kelamin ?? 'KOSONG' }}
                    </td>

                    {{-- 4. Daftar Pelanggaran (Box-box kecil) --}}
                    <td class="border px-4 py-2 text-left">
                        <div class="flex flex-col gap-2">
                            @foreach($daftarPelanggaran as $p)
                            <div class="border p-2 rounded bg-gray-50 text-xs shadow-sm">
                                <span class="text-blue-700 font-bold">[{{ $p->kategori }}]</span> {{ $p->keterangan }}
                                <div class="text-gray-500 mt-1">Tingkat: {{ $p->jenis }} | Poin: {{ $p->poin }}</div>
                            </div>
                            @endforeach
                        </div>
                    </td>

                    {{-- 5. Total Poin --}}
                    <td class="border px-4 py-2 text-center font-black text-red-600">
                        {{ $daftarPelanggaran->sum('poin') }}
                    </td>

                    {{-- 6. Tombol Aksi (Tetap di kolom paling kanan) --}}
                    @if(auth()->user()->role != 'SISWA')
                    <td class="border px-4 py-2 text-center">
                        <div class="flex flex-col gap-2 justify-center items-center">
                            {{-- Mengambil ID dari pelanggaran terbaru siswa tersebut --}}
                            @php $idTerakhir = $daftarPelanggaran->first()->id; @endphp
                            
                            <a href="{{ route('monitoring.edit', $idTerakhir) }}" class="inline-flex items-center px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white text-xs font-bold rounded shadow-sm transition w-20 justify-center">
                                <i class="fa fa-pencil-alt mr-1"></i> Edit
                            </a>
                            
                            <form action="{{ route('monitoring.destroy', $idTerakhir) }}" method="POST" onsubmit="return confirm('Yakin hapus data terbaru siswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs font-bold rounded shadow-sm transition w-20 justify-center">
                                    <i class="fa fa-trash mr-1"></i> Delete
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="{{ auth()->user()->role == 'SISWA' ? 5 : 6 }}" class="text-center py-4 text-gray-500 italic">
                        Belum ada data monitoring
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection