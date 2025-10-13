@extends('layouts.app')

@section('title', 'Statistik Pelanggaran')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">📊 Statistik Pelanggaran</h1>

    <div class="row">
        <!-- Statistik Kategori -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">Kategori Pelanggaran</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($kategori as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                {{ $item->kategori }}
                                <span class="badge bg-secondary">{{ $item->total }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Top 5 Pelanggaran -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">Top 5 Pelanggaran</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($topPelanggaran as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                {{ $item->deskripsi }}
                                <span class="badge bg-secondary">{{ $item->total }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Statistik per Kelas -->
        <div class="col-md-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-white">Statistik per Kelas</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($kelas as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                {{ $item->nama_kelas }}
                                <span class="badge bg-secondary">{{ $item->total }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tren Bulanan -->
        <div class="col-md-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">Tren Pelanggaran per Bulan</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($trend as $item)
                            <li class="list-group-item d-flex justify-content-between">
                                {{ $item->bulan }}
                                <span class="badge bg-secondary">{{ $item->total }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
