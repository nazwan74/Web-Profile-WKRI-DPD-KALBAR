<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kegiatan->judul }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Navbar Bootstrap mirip Beranda -->
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
                        <a class="nav-link dropdown-toggle" href="#" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Galeri
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="galeriDropdown">
                            <li><a class="dropdown-item" href="#">Foto</a></li>
                            <li><a class="dropdown-item" href="#">Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('kontak.index') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm p-4">
                <h2 class="mb-2 text-center">{{ $kegiatan->judul }}</h2>
                <p class="text-muted text-center" style="font-size: 0.95rem;">{{ $kegiatan->created_at->format('d-m-Y') }}</p>
                @if($kegiatan->gambar)
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/'.$kegiatan->gambar) }}" alt="Gambar Kegiatan" class="img-fluid rounded" style="max-height:350px; object-fit:cover;">
                    </div>
                @endif
                <div style="line-height:1.8; font-size:1.08rem;">
                    {!! $kegiatan->deskripsi !!}
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('kegiatan.list') }}" class="btn btn-secondary">Kembali ke Daftar Kegiatan</a>
                </div>
            </div>
        </div>
    </div>
    {{-- Jika ingin menampilkan kegiatan lain, bisa tambahkan di sini seperti bagian 'Baca Juga' pada artikel --}}
    @if(isset($kegiatans_lain) && $kegiatans_lain->count())
    <div class="row justify-content-center mt-5">
        <div class="col-lg-10">
            <h4 class="mb-4 fw-bold">Baca Juga</h4>
            <div class="row">
                @foreach($kegiatans_lain as $lain)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($lain->gambar)
                        <img src="{{ asset('storage/'.$lain->gambar) }}" alt="Banner Kegiatan" class="card-img-top" style="height:180px; object-fit:cover;">
                        @endif
                        <div class="card-body">
                            <h6 class="card-title fw-bold" style="min-height:48px;">
                                <a href="{{ route('kegiatan.show', $lain->id) }}" style="color:inherit; text-decoration:none;">{{ $lain->judul }}</a>
                            </h6>
                            <p class="text-muted mb-0" style="font-size:0.95rem;">{{ $lain->created_at->format('d-m-Y') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
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
</body>
</html> 