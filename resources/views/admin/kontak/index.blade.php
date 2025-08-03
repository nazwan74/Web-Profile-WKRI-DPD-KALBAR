@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Kelola Pesan Kontak</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-envelope me-2"></i>
                            Daftar Pesan Kontak
                        </h5>
                    </div>
                    <div class="card-body">
                        @if($kontaks->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Status</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. HP</th>
                                            <th>Pesan</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kontaks as $kontak)
                                            <tr class="{{ $kontak->status === 'unread' ? 'table-warning' : '' }}">
                                                <td>
                                                    @if($kontak->status === 'unread')
                                                        <span class="badge bg-warning">
                                                            <i class="bi bi-envelope me-1"></i>Baru
                                                        </span>
                                                    @else
                                                        <span class="badge bg-success">
                                                            <i class="bi bi-envelope-open me-1"></i>Dibaca
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <strong>{{ $kontak->nama }}</strong>
                                                </td>
                                                <td>
                                                    <a href="mailto:{{ $kontak->email }}" class="text-decoration-none">
                                                        {{ $kontak->email }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="tel:{{ $kontak->no_hp }}" class="text-decoration-none">
                                                        {{ $kontak->no_hp }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <div class="text-truncate" style="max-width: 200px;" title="{{ $kontak->pesan }}">
                                                        {{ Str::limit($kontak->pesan, 50) }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <small class="text-muted">
                                                        {{ $kontak->created_at->format('d/m/Y H:i') }}
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('admin.kontak.show', $kontak->id) }}" 
                                                           class="btn btn-sm btn-primary" 
                                                           title="Lihat Detail">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                        @if($kontak->status === 'unread')
                                                            <form action="{{ route('admin.kontak.mark-read', $kontak->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-sm btn-success" title="Tandai Dibaca">
                                                                    <i class="bi bi-check"></i>
                                                                </button>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('admin.kontak.mark-unread', $kontak->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('PATCH')
                                                                <button type="submit" class="btn btn-sm btn-warning" title="Tandai Belum Dibaca">
                                                                    <i class="bi bi-envelope"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        <form action="{{ route('admin.kontak.destroy', $kontak->id) }}" method="POST" class="d-inline form-hapus">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="d-flex justify-content-center mt-4">
                                {{ $kontaks->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-inbox text-muted fa-3x mb-3"></i>
                                <h5 class="text-muted">Belum ada pesan kontak</h5>
                                <p class="text-muted">Pesan dari pengunjung akan muncul di sini</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        });
    </script>
@endsection 