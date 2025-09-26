<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - WKRI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .contact-form {
            background: #f8f9fa;
            min-height: 100vh;
            padding: 80px 0;
        }
        .contact-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.04);
            border: 1px solid #e9ecef;
        }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13,110,253,.08);
        }
        .btn-primary {
            background: #0d6efd;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: #0b5ed7;
            box-shadow: 0 4px 16px rgba(13,110,253,0.10);
        }
        .contact-info {
            background: #fff;
            color: #212529;
            border-radius: 16px;
            border: 1px solid #e9ecef;
            padding: 40px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.04);
        }
        .contact-icon {
            width: 60px;
            height: 60px;
            background: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #0d6efd;
        }
        .display-4, .lead, h3, h5, h6, label, .form-label, .navbar-brand, .nav-link {
            color: #212529 !important;
        }
        .navbar {
            background: #fff !important;
        }
    </style>
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
                            <li><a class="dropdown-item" href="{{ route('galeri.album') }}">Foto</a></li>
                            <li><a class="dropdown-item" href="{{ route('galeri.video') }}">Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link active" href="{{ route('kontak.index') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contact Section -->
    <section class="contact-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="text-center mb-5">
                        <h1 class="display-4 fw-bold mb-3">Hubungi Kami</h1>
                        <p class="lead text-secondary">Kami siap melayani pertanyaan dan saran Anda</p>
                    </div>
                    
                    <div class="row">
                        <!-- Contact Form -->
                        <div class="col-lg-8 mb-4">
                            <div class="contact-card p-5">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <i class="bi bi-check-circle me-2"></i>
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <h3 class="mb-4 text-center">Kirim Pesan</h3>
                                <form action="{{ route('kontak.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                                        @error('no_hp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="pesan" class="form-label">Pesan <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('pesan') is-invalid @enderror" id="pesan" name="pesan" rows="5" required>{{ old('pesan') }}</textarea>
                                        @error('pesan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="bi bi-send me-2"></i>Kirim Pesan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="col-lg-4">
                            <div class="contact-info h-100">
                                <h3 class="mb-4 text-center">Informasi Kontak</h3>
                                
                                <div class="text-center mb-4">
                                    <div class="contact-icon mx-auto">
                                        <i class="bi bi-geo-alt-fill fa-2x"></i>
                                    </div>
                                    <h5>Alamat</h5>
                                    <p class="mb-0">Jalan Daeng Abdul Hadi No.146, Akcaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78121</p>
                                </div>

                                <div class="text-center mb-4">
                                    <div class="contact-icon mx-auto">
                                        <i class="bi bi-telephone-fill fa-2x"></i>
                                    </div>
                                    <h5>Telepon</h5>
                                    <p class="mb-0">+62 21 1234 5678</p>
                                </div>

                                <div class="text-center mb-4">
                                    <div class="contact-icon mx-auto">
                                        <i class="bi bi-envelope-fill fa-2x"></i>
                                    </div>
                                    <h5>Email</h5>
                                    <p class="mb-0">info@wkri.org</p>
                                </div>

                                <div class="text-center">
                                    <div class="contact-icon mx-auto">
                                        <i class="bi bi-clock-fill fa-2x"></i>
                                    </div>
                                    <h5>Jam Kerja</h5>
                                    <p class="mb-0">Senin - Jumat<br>08:00 - 17:00 WIB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 