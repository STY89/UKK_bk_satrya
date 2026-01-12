@extends('dashboard.menu')

@section('title', 'Tambah Monitoring')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Tambah Monitoring</h1>

    <div class="bg-white rounded-xl shadow-lg p-6 max-w-2xl">
        <form action="{{ route('monitoring.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Siswa</label>
                <select name="nama_siswa" class="w-full border px-3 py-2 rounded-lg" required>
                    <option value="" disabled selected>Pilih Siswa</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->name }}">{{ $s->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full border px-3 py-2 rounded-lg" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Kategori</label>
                <input type="text" name="kategori" class="w-full border px-3 py-2 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Keterangan</label>
                <input type="text" name="keterangan" class="w-full border px-3 py-2 rounded-lg" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Poin</label>
                <input type="number" name="poin" class="w-full border px-3 py-2 rounded-lg" value="0" required>
            </div>

            <div class="mb-6">
                <label class="block font-semibold mb-1">Tingkat Pelanggaran</label>
                <select name="jenis" class="w-full border px-3 py-2 rounded-lg" required>
                    <option value="Ringan">Ringan</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Berat">Berat</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-bold">
                Simpan Data
            </button>
            <a href="{{ route('monitoring.index') }}" class="text-gray-500 hover:underline ml-4">Batal</a>
        </form>
    </div>
</div>
@endsection
