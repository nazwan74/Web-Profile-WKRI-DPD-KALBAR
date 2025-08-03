<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - WKRI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo-container img {
            max-width: 120px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-card p-5">
                    <div class="logo-container">
                        <img src="/images/logo3.png" alt="Logo WKRI" class="mb-3">
                        <h4 class="text-dark mb-0">Admin Panel</h4>
                        <p class="text-muted small">WKRI DPD Kalimantan Barat</p>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            {{ $errors->first() }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label text-dark">Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope text-muted"></i>
                                </span>
                                <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" 
                                       placeholder="Masukkan email Anda" required autofocus>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-dark">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock text-muted"></i>
                                </span>
                                <input type="password" class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                       id="password" name="password" 
                                       placeholder="Masukkan password Anda" required>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-login text-white">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                Masuk
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <a href="/beranda" class="text-decoration-none text-muted small">
                            <i class="bi bi-arrow-left me-1"></i>
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 