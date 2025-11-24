@php $isEdit = isset($prestasi); @endphp

<form action="{{ $isEdit ? route('prestasi.update', $prestasi->id) : route('prestasi.store') }}" 
      method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Nama Siswa</label>
        <input type="text" name="nama_siswa" class="form-control"
               value="{{ old('nama_siswa', $prestasi->nama_siswa ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Judul Prestasi</label>
        <input type="text" name="judul_prestasi" class="form-control"
               value="{{ old('judul_prestasi', $prestasi->judul_prestasi ?? '') }}" required>
    </div>

    <div class="mb-3">
    <label for="tingkat" class="form-label">Tingkat</label>
    <input type="text" name="tingkat" id="tingkat" class="form-control"
        value="{{ old('tingkat', $prestasi->tingkat ?? '') }}" required>
</div>

    <div class="mb-3">
        <label class="form-label">Keterangan / Pesan</label>
        <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $prestasi->keterangan ?? '') }}</textarea>
    </div>

    <div class="mb-3">
    <label class="form-label">Foto Prestasi</label>
    <input type="file" name="foto" class="form-control">
    @if($isEdit && $prestasi->foto)
        <img src="{{ asset('assets/prestasi/'.$prestasi->foto) }}" width="150" class="mt-2">
    @endif
</div>


    <button class="btn btn-primary">{{ $isEdit ? 'Update' : 'Simpan' }}</button>
</form>
