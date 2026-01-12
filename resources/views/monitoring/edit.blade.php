@extends('dashboard.menu')

@section('title', 'Edit Monitoring')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Monitoring</h1>

    <div class="bg-white rounded-xl shadow-lg p-6 max-w-2xl">
        <form action="{{ route('monitoring.update', $monitoring->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Siswa</label>
                <select name="nama_siswa" class="w-full border px-3 py-2 rounded-lg" required>
                    @foreach($siswa as $s)
                        <option value="{{ $s->name }}" {{ $s->name == $monitoring->nama_siswa ? 'selected' : '' }}>
                            {{ $s->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border px-3 py-2 rounded-lg" required>
                    <option value="Laki-laki" {{ $monitoring->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $monitoring->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Kategori</label>
                <input type="text" name="kategori" class="w-full border px-3 py-2 rounded-lg" value="{{ $monitoring->kategori }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Keterangan</label>
                <input type="text" name="keterangan" class="w-full border px-3 py-2 rounded-lg" value="{{ $monitoring->keterangan }}" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Poin</label>
                <input type="number" name="poin" class="w-full border px-3 py-2 rounded-lg" value="{{ $monitoring->poin }}" required>
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-1">Tingkat Pelanggaran</label>
                <select name="jenis" class="w-full border px-3 py-2 rounded-lg" required>
                    <option value="tidak ada" {{ $monitoring->jenis == 'tidak ada' ? 'selected' : '' }}>tidak ada</option>
                    <option value="Ringan" {{ $monitoring->jenis == 'Ringan' ? 'selected' : '' }}>Ringan</option>
                    <option value="Sedang" {{ $monitoring->jenis == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                    <option value="Berat" {{ $monitoring->jenis == 'Berat' ? 'selected' : '' }}>Berat</option>
                </select>
            </div>

            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded-lg font-bold">
                Update Data
            </button>
            <a href="{{ route('monitoring.index') }}" class="text-gray-500 hover:underline ml-4">Batal</a>
        </form>
    </div>
</div>
@endsection
