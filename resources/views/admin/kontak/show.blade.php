@extends('layouts.app')

@section('content')
    <!-- Navbar khusus halaman ini -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom mb-4">
        <div class="container-fluid px-0">
            <span class="navbar-brand fw-bold">Detail Pesan Kontak</span>
            <div class="ms-auto">
                <form action="#" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger" id="logoutBtnKontak">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-envelope me-2"></i>
                                Detail Pesan dari {{ $kontak->nama }}
                            </h5>
                            <div>
                                <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-arrow-left me-1"></i>Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Pesan -->
                                <div class="mb-4">
                                    <h6 class="text-muted mb-2">Pesan:</h6>
                                    <div class="border rounded p-3 bg-light">
                                        <p class="mb-0">{{ $kontak->pesan }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- Informasi Pengirim -->
                                <div class="card bg-light">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <i class="bi bi-person me-2"></i>Informasi Pengirim
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Nama:</label>
                                            <p class="mb-0 fw-bold">{{ $kontak->nama }}</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Email:</label>
                                            <p class="mb-0">
                                                <a href="mailto:{{ $kontak->email }}" class="text-decoration-none">
                                                    {{ $kontak->email }}
                                                </a>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">No. Telepon:</label>
                                            <p class="mb-0">
                                                <a href="tel:{{ $kontak->no_hp }}" class="text-decoration-none">
                                                    {{ $kontak->no_hp }}
                                                </a>
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Status:</label>
                                            <p class="mb-0">
                                                @if($kontak->status === 'unread')
                                                    <span class="badge bg-warning">
                                                        <i class="bi bi-envelope me-1"></i>Belum Dibaca
                                                    </span>
                                                @else
                                                    <span class="badge bg-success">
                                                        <i class="bi bi-envelope-open me-1"></i>Sudah Dibaca
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label text-muted small">Tanggal Kirim:</label>
                                            <p class="mb-0">{{ $kontak->created_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Aksi -->
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <h6 class="mb-0">
                                            <i class="bi bi-gear me-2"></i>Aksi
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-grid gap-2">
                                            @if($kontak->status === 'unread')
                                                <form action="{{ route('admin.kontak.mark-read', $kontak->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm w-100">
                                                        <i class="bi bi-check me-1"></i>Tandai Dibaca
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.kontak.mark-unread', $kontak->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-warning btn-sm w-100">
                                                        <i class="bi bi-envelope me-1"></i>Tandai Belum Dibaca
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <a href="mailto:{{ $kontak->email }}?subject=Balasan dari WKRI" class="btn btn-primary btn-sm">
                                                <i class="bi bi-reply me-1"></i>Balas Email
                                            </a>
                                            
                                            <a href="tel:{{ $kontak->no_hp }}" class="btn btn-info btn-sm">
                                                <i class="bi bi-telephone me-1"></i>Telepon
                                            </a>
                                            
                                            <form action="{{ route('admin.kontak.destroy', $kontak->id) }}" method="POST" class="form-hapus">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm w-100">
                                                    <i class="bi bi-trash me-1"></i>Hapus Pesan
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('.form-hapus');
            forms.forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: 'Pesan kontak yang dihapus tidak dapat dikembalikan!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            var logoutBtn = document.getElementById('logoutBtnKontak');
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
    @endpush
@endsection 