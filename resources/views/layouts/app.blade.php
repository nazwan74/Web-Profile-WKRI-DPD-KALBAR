<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background: #fff;
            color: #212529;
            border-right: 1px solid #dee2e6;
        }
        .sidebar .nav-link { color: #212529; }
        .sidebar .nav-link.active, .sidebar .nav-link:hover { background: #f8f9fa; color: #0d6efd; }
        main { background: #fff; min-height: 100vh; }
    </style>
</head>
<body>
<nav class="navbar bg-white border-bottom sticky-top">
    <div class="container-fluid">
        <button class="btn btn-outline-primary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminSidebar" aria-controls="adminSidebar">
            <i class="bi bi-list"></i>
            Menu
        </button>
        <a class="navbar-brand ms-2" href="{{ route('admin.dashboard') }}">Admin</a>
    </div>
</nav>

<!-- Desktop layout (original) -->
<div class="container-fluid d-none d-md-block">
    <div class="row">
        <nav class="col-md-2 sidebar py-4">
            <div class="position-sticky">
                <div class="text-center mb-4">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="/images/logo3.png" alt="Logo WKRI" style="max-width:120px; width:100%; height:auto;">
                    </a>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link @if(request()->is('admin/dashboard')) active @endif" href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link @if(request()->is('admin/artikel*')) active @endif" href="{{ route('artikel.index') }}">
                            <i class="bi bi-file-earmark-text me-2"></i>
                            Artikel
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link @if(request()->is('admin/carousel*')) active @endif" href="{{ route('carousel.index') }}">
                            <i class="bi bi-images me-2"></i>
                            Banner
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link @if(request()->is('admin/kegiatan*')) active @endif" href="{{ route('kegiatan.index') }}">
                            <i class="bi bi-calendar-event me-2"></i>
                            Kegiatan
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link @if(request()->is('admin/album*') || request()->is('admin/galeri-foto/create')) active @endif" href="{{ route('album.index') }}">
                            <i class="bi bi-collection me-2"></i>
                            Album
                        </a>
                        <ul class="nav flex-column ms-4">
                            <li class="nav-item mb-1">
                                <a class="nav-link @if(request()->is('admin/album/create')) active @endif" href="{{ route('album.create') }}">
                                    <i class="bi bi-plus-circle me-1"></i> Tambah Album
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link @if(request()->is('admin/galeri-foto/create')) active @endif" href="{{ route('galeri-foto.create') }}">
                                    <i class="bi bi-plus-square me-1"></i> Tambah Foto
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link @if(request()->is('admin/video*')) active @endif" href="{{ route('video.index') }}">
                            <i class="bi bi-camera-reels me-2"></i>
                            Video
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link @if(request()->is('admin/tentang-kami*')) active @endif" href="{{ route('admin.tentang-kami.index') }}">
                            <i class="bi bi-info-circle me-2"></i>
                            Tentang Kami
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link @if(request()->is('admin/kontak*')) active @endif" href="{{ route('admin.kontak.index') }}">
                            <i class="bi bi-envelope me-2"></i>
                            Pesan Kontak
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link @if(request()->is('admin/user*')) active @endif" href="{{ route('admin.user.index') }}">
                            <i class="bi bi-people me-2"></i>
                            Kelola Admin
                        </a>
                    </li>
                </ul>

                <!-- Logout Section -->
                <div class="mt-auto pt-4 border-top">
                    <div class="text-center mb-3">
                        <small class="text-muted">Logged in as</small><br>
                        <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="d-grid">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm" id="logoutBtn">
                            <i class="bi bi-box-arrow-right me-2"></i>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <main class="col-md-10 ms-sm-auto px-md-4 py-4">
            @yield('content')
        </main>
    </div>
    </div>

<!-- Mobile main content (visible only on small screens) -->
<main class="px-3 py-4 d-block d-md-none">
    @yield('content')
</main>

<!-- Mobile offcanvas menu -->
<nav id="adminSidebar" class="offcanvas offcanvas-start d-md-none sidebar" tabindex="-1" aria-labelledby="adminSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="adminSidebarLabel">Menu</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="text-center mb-4">
            <a href="{{ route('admin.dashboard') }}">
                <img src="/images/logo3.png" alt="Logo WKRI" style="max-width:120px; width:100%; height:auto;">
            </a>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a class="nav-link @if(request()->is('admin/dashboard')) active @endif" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link @if(request()->is('admin/artikel*')) active @endif" href="{{ route('artikel.index') }}">
                    <i class="bi bi-file-earmark-text me-2"></i>
                    Artikel
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link @if(request()->is('admin/carousel*')) active @endif" href="{{ route('carousel.index') }}">
                    <i class="bi bi-images me-2"></i>
                    Banner
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link @if(request()->is('admin/kegiatan*')) active @endif" href="{{ route('kegiatan.index') }}">
                    <i class="bi bi-calendar-event me-2"></i>
                    Kegiatan
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link @if(request()->is('admin/album*') || request()->is('admin/galeri-foto/create')) active @endif" href="{{ route('album.index') }}">
                    <i class="bi bi-collection me-2"></i>
                    Album
                </a>
                <ul class="nav flex-column ms-4">
                    <li class="nav-item mb-1">
                        <a class="nav-link @if(request()->is('admin/album/create')) active @endif" href="{{ route('album.create') }}">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Album
                        </a>
                    </li>
                    <li class="nav-item mb-1">
                        <a class="nav-link @if(request()->is('admin/galeri-foto/create')) active @endif" href="{{ route('galeri-foto.create') }}">
                            <i class="bi bi-plus-square me-1"></i> Tambah Foto
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link @if(request()->is('admin/video*')) active @endif" href="{{ route('video.index') }}">
                    <i class="bi bi-camera-reels me-2"></i>
                    Video
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link @if(request()->is('admin/tentang-kami*')) active @endif" href="{{ route('admin.tentang-kami.index') }}">
                    <i class="bi bi-info-circle me-2"></i>
                    Tentang Kami
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link @if(request()->is('admin/kontak*')) active @endif" href="{{ route('admin.kontak.index') }}">
                    <i class="bi bi-envelope me-2"></i>
                    Pesan Kontak
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link @if(request()->is('admin/user*')) active @endif" href="{{ route('admin.user.index') }}">
                    <i class="bi bi-people me-2"></i>
                    Kelola Admin
                </a>
            </li>
        </ul>
        <div class="mt-auto pt-4 border-top">
            <div class="text-center mb-3">
                <small class="text-muted">Logged in as</small><br>
                <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="d-grid">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm" id="logoutBtn">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var logoutBtn = document.getElementById('logoutBtn');
        if (logoutBtn) {
            logoutBtn.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Yakin ingin logout?',
                    text: 'Anda akan keluar dari sesi admin.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, logout!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        }
    });
</script>
@stack('scripts')
</body>
</html> 