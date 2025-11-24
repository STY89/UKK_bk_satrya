@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Prestasi</h1>
    <a href="{{ route('prestasi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    @include('prestasi.form', ['prestasi' => null])
</div>
@endsection
