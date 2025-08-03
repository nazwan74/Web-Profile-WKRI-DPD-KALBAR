<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - WKRI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/beranda">
                <img src="/images/logo3.png" alt="Logo WKRI" height="40" class="d-inline-block align-text-top me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="/beranda">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link active" href="{{ route('tentang-kami.index') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('artikel.list') }}">Artikel</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('kegiatan.list') }}">Kegiatan</a>
                    </li>
                    <li class="nav-item dropdown mx-2">
                        <a class="nav-link dropdown-toggle" href="#" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Galeri
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="galeriDropdown">
                            <li><a class="dropdown-item" href="{{ route('galeri.album') }}">Foto</a></li>
                            <li><a class="dropdown-item" href="{{ route('galeri.video') }}">Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('kontak.index') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container mt-5">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-4 fw-bold text-primary mb-3">Tentang Kami</h1>
            <p class="lead text-muted">Mengenal lebih dekat WKRI (Wanita Katolik Republik Indonesia)</p>
        </div>
    </div>

    @if($tentangKami)


        <!-- Logo Section -->
        @if($tentangKamiImage->logo)
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $tentangKamiImage->logo) }}" 
                                 alt="Logo WKRI" 
                                 class="img-fluid" 
                                 style="max-width: 300px; height: auto;">
                        </div>
                        <h2 class="h3 fw-bold text-primary">Logo WKRI</h2>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row mb-5">
            <div class="col-lg-6 mx-auto">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="fas fa-image text-muted fa-4x"></i>
                        </div>
                        <h2 class="h3 fw-bold text-muted">Logo Belum Diupload</h2>
                        <p class="text-muted">Admin belum mengupload logo organisasi</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Filosofi Logo Section -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-star text-white fa-2x"></i>
                            </div>
                            <h2 class="h3 fw-bold text-primary">Filosofi Logo</h2>
                        </div>
                        <div class="text-justify">
                            {!! nl2br(e($tentangKami->filosofi_logo)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tentang Kami Section -->
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow-sm border-0 bg-light">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-users text-white fa-2x"></i>
                            </div>
                            <h2 class="h3 fw-bold text-success">Tentang Kami</h2>
                        </div>
                        <div class="text-justify">
                            {!! nl2br(e($tentangKami->tentang_kami)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sejarah Section -->
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-history text-white fa-2x"></i>
                            </div>
                            <h2 class="h3 fw-bold text-warning">Sejarah</h2>
                        </div>
                        <div class="text-justify">
                            {!! nl2br(e($tentangKami->sejarah)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doa Santa Anna Section -->
        @if($tentangKami->doa_santa_anna)
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow-sm border-0 bg-light">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="bg-danger rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-pray text-white fa-2x"></i>
                            </div>
                            <h2 class="h3 fw-bold text-danger">Doa Santa Anna</h2>
                        </div>
                        <div class="text-justify">
                            {!! nl2br(e($tentangKami->doa_santa_anna)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Struktur Organisasi Section -->
        @if($tentangKamiImage->struktur_organisasi)
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow-sm border-0 bg-light">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-sitemap text-white fa-2x"></i>
                            </div>
                            <h2 class="h3 fw-bold text-info">Struktur Organisasi</h2>
                        </div>
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $tentangKamiImage->struktur_organisasi) }}" 
                                 alt="Struktur Organisasi WKRI" 
                                 class="img-fluid rounded shadow" 
                                 style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row mb-5">
            <div class="col-lg-10 mx-auto">
                <div class="card shadow-sm border-0 bg-light">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="fas fa-sitemap text-white fa-2x"></i>
                            </div>
                            <h2 class="h3 fw-bold text-info">Struktur Organisasi</h2>
                        </div>
                        <div class="text-center">
                            <div class="mb-4">
                                <i class="fas fa-image text-muted fa-4x"></i>
                            </div>
                            <h3 class="text-muted mb-3">Gambar Belum Diupload</h3>
                            <p class="text-muted">Admin belum mengupload gambar struktur organisasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    @else
        <!-- No Data Section -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-5 text-center">
                        <div class="mb-4">
                            <i class="fas fa-info-circle text-muted fa-4x"></i>
                        </div>
                        <h3 class="text-muted mb-3">Informasi Belum Tersedia</h3>
                        <p class="text-muted">Konten "Tentang Kami" sedang dalam pengembangan. Silakan kembali lagi nanti.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Footer -->
<footer class="bg-dark text-white mt-5 py-4">
    <div class="container text-center">
        <img src="/images/logo3.png" alt="Logo WKRI" height="40" class="mb-2">
        <div class="mb-2 fw-bold">WKRI DPD Kalimantan Barat</div>
        <div class="mb-2 small">
            Jl. Contoh Alamat No. 123, Kota, Provinsi<br>
            Email: info@wkri.org | Telp: 0812-3456-7890
        </div>
        <div class="mb-2">
            <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
            <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
        </div>
        <div class="small text-secondary">&copy; {{ date('Y') }} WKRI. All rights reserved.</div>
    </div>
</footer>

<style>
.text-justify {
    text-align: justify;
}

.card {
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.rounded-circle {
    transition: transform 0.3s ease;
}

.card:hover .rounded-circle {
    transform: scale(1.1);
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 