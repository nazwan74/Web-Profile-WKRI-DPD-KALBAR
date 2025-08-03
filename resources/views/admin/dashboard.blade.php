@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Dashboard</h1>
        <div class="text-muted">
            Selamat datang, {{ Auth::user()->name }}!
        </div>
    </div>

    <!-- Statistik Cards -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Artikel</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_artikel }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-file-earmark-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Kegiatan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_kegiatan }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar-event fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total Foto</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_foto }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Video</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_video }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-camera-reels fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Pesan Terbaru -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pesan Terbaru</h6>
                    <a href="{{ route('admin.kontak.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @if($pesan_terbaru->count() > 0)
                        @foreach($pesan_terbaru as $pesan)
                        <div class="border-bottom pb-2 mb-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong>{{ $pesan->nama }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $pesan->email }}</small>
                                </div>
                                <small class="text-muted">{{ $pesan->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1 mt-1">{{ Str::limit($pesan->pesan, 100) }}</p>
                        </div>
                        @endforeach
                    @else
                        <p class="text-muted text-center">Belum ada pesan</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Artikel Terbaru -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Artikel Terbaru</h6>
                    <a href="{{ route('artikel.index') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                </div>
                <div class="card-body">
                    @if($artikel_terbaru->count() > 0)
                        @foreach($artikel_terbaru as $artikel)
                        <div class="border-bottom pb-2 mb-2">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <strong>{{ $artikel->judul }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($artikel->isi, 80) }}</small>
                                </div>
                                <small class="text-muted">{{ $artikel->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-muted text-center">Belum ada artikel</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('artikel.create') }}" class="btn btn-primary w-100">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Artikel
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('kegiatan.create') }}" class="btn btn-success w-100">
                                <i class="bi bi-calendar-plus me-2"></i>Tambah Kegiatan
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('galeri-foto.create') }}" class="btn btn-info w-100">
                                <i class="bi bi-image me-2"></i>Tambah Foto
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('video.create') }}" class="btn btn-warning w-100">
                                <i class="bi bi-camera-video me-2"></i>Tambah Video
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-info w-100">
                                <i class="bi bi-person-plus me-2"></i>Tambah Admin
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}
.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}
.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}
.text-gray-300 {
    color: #dddfeb !important;
}
.text-gray-800 {
    color: #5a5c69 !important;
}
.font-weight-bold {
    font-weight: 700 !important;
}
.text-xs {
    font-size: 0.7rem;
}
</style>
@endsection 