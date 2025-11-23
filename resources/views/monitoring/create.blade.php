@extends('layouts.app')

@section('title', 'Tambah Monitoring')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Tambah Monitoring</h1>

    <form action="{{ route('monitoring.store') }}" method="POST">
        @csrf

        <!-- Wrapper input nama siswa -->
        <div id="siswa-wrapper">
            <div class="mb-4 siswa-item">
                <label class="block mb-1">Nama Siswa</label>
                <input type="text" name="nama_siswa[]" class="w-full border px-2 py-1 rounded" placeholder="Masukkan nama siswa" required>
            </div>
        </div>

        <!-- Tombol tambah siswa -->
        <button type="button" id="tambah-siswa" class="bg-green-500 text-white px-3 py-1 rounded mb-4">Tambah Siswa</button>

        <!-- Input lain -->
        <div class="mb-4">
            <label class="block mb-1">Kategori</label>
            <input type="text" name="kategori" class="w-full border px-2 py-1 rounded" value="{{ old('kategori') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Keterangan</label>
            <input type="text" name="keterangan" class="w-full border px-2 py-1 rounded" value="{{ old('keterangan') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Poin</label>
            <input type="number" name="poin" class="w-full border px-2 py-1 rounded" value="{{ old('poin', 0) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Jenis</label>
            <input type="text" name="jenis" class="w-full border px-2 py-1 rounded" placeholder="Jenis" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
    </form>
</div>

<script>
const tambahBtn = document.getElementById('tambah-siswa');
const wrapper = document.getElementById('siswa-wrapper');

tambahBtn.addEventListener('click', () => {
    const div = document.createElement('div');
    div.classList.add('mb-4', 'siswa-item');
    div.innerHTML = `
        <label class="block mb-1">Nama Siswa</label>
        <input type="text" name="nama_siswa[]" class="w-full border px-2 py-1 rounded" placeholder="Masukkan nama siswa" required>
    `;
    wrapper.appendChild(div);
});
</script>
@endsection
