<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .card-anim {
        transition: transform 0.25s cubic-bezier(0.4,0,0.2,1), box-shadow 0.25s cubic-bezier(0.4,0,0.2,1);
    }
    .card-anim:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 32px rgba(0,0,0,0.18), 0 1.5px 6px rgba(0,0,0,0.10);
        z-index: 2;
    }
    </style>
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
                        <a class="nav-link active" href="{{ route('kegiatan.index') }}">Kegiatan</a>
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
    <div class="container my-5">
        <h2 class="mb-4 fw-bold text-center">Daftar Kegiatan</h2>
        <div class="row">
            @forelse($kegiatans as $kegiatan)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm card-anim">
                    @if($kegiatan->gambar)
                    <img src="{{ asset('storage/'.$kegiatan->gambar) }}" alt="Banner Kegiatan" class="card-img-top" style="height:180px; object-fit:cover;">
                    @endif
                    <div class="card-body">
                        <h6 class="card-title fw-bold" style="min-height:48px;">
                            {{ $kegiatan->judul }}
                        </h6>
                        <p class="text-muted mb-1" style="font-size:0.95rem;">{{ $kegiatan->tanggal ? \Carbon\Carbon::parse($kegiatan->tanggal)->format('d-m-Y') : '' }}</p>
                        <div style="font-size:0.98rem; color:#444; min-height:60px;">
                            {{ strip_tags(Str::limit($kegiatan->deskripsi, 100)) }}
                        </div>
                        <a href="/kegiatan/{{ $kegiatan->id }}" class="btn btn-sm btn-primary mt-2">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted py-5">
                Belum ada kegiatan.
            </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $kegiatans->links() }}
        </div>
    </div>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 