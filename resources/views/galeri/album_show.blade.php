<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $album->nama }} - Galeri Album</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
                        <a class="nav-link" href="{{ route('tentang-kami.index') }}">Tentang Kami</a>
                    </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('artikel.list') }}">Artikel</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('kegiatan.list') }}">Kegiatan</a>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle active" href="#" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Galeri
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="galeriDropdown">
                        <li><a class="dropdown-item active" href="{{ route('galeri.album') }}">Foto</a></li>
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
<div class="container my-5">
    <h2 class="fw-bold mb-2">{{ $album->nama }}</h2>
    <p class="text-muted">{{ $album->deskripsi }}</p>
    <div class="row">
        @forelse($album->fotos as $foto)
            <div class="col-md-4 mb-4">
                <img src="{{ asset('storage/'.$foto->gambar) }}" class="img-fluid rounded shadow-sm" alt="{{ $foto->judul }}">
                <div class="mt-2">{{ $foto->judul }}</div>
            </div>
        @empty
            <div class="col-12 text-center text-muted py-5">Belum ada foto di album ini.</div>
        @endforelse
    </div>
    <a href="{{ route('galeri.album') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Album</a>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 