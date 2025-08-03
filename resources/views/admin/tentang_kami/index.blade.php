@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Kelola Tentang Kami</h1>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kelola Tentang Kami</h3>
                    </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($tentangKami)
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Logo</h5>
                                @if($tentangKamiImage->logo)
                                    <div class="border rounded p-3 mb-3">
                                        <img src="{{ asset('storage/' . $tentangKamiImage->logo) }}" 
                                             alt="Logo WKRI" 
                                             class="img-fluid" 
                                             style="max-width: 200px; height: auto;">
                                    </div>
                                @else
                                    <div class="border rounded p-3 mb-3 text-muted">
                                        Belum ada logo
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h5>Filosofi Logo</h5>
                                <div class="border rounded p-3 mb-3">
                                    {!! nl2br(e($tentangKami->filosofi_logo)) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Tentang Kami</h5>
                                <div class="border rounded p-3 mb-3">
                                    {!! nl2br(e($tentangKami->tentang_kami)) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Sejarah</h5>
                                <div class="border rounded p-3 mb-3">
                                    {!! nl2br(e($tentangKami->sejarah)) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Doa Santa Anna</h5>
                                <div class="border rounded p-3 mb-3">
                                    {!! nl2br(e($tentangKami->doa_santa_anna)) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5>Struktur Organisasi</h5>
                                @if($tentangKamiImage->struktur_organisasi)
                                    <div class="border rounded p-3 mb-3">
                                        <img src="{{ asset('storage/' . $tentangKamiImage->struktur_organisasi) }}" 
                                             alt="Struktur Organisasi" 
                                             class="img-fluid" 
                                             style="max-width: 100%; height: auto;">
                                    </div>
                                @else
                                    <div class="border rounded p-3 mb-3 text-muted">
                                        Belum ada gambar struktur organisasi
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.tentang-kami.edit', $tentangKami->id) }}" 
                               class="btn btn-primary">
                                <i class="fas fa-edit"></i> Edit Konten
                            </a>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <h4>Belum ada data Tentang Kami</h4>
                            <p class="text-muted">Silakan tambahkan data pertama kali</p>
                            <a href="{{ route('admin.tentang-kami.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Data
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// SweetAlert untuk notifikasi sukses
@if(session('success'))
    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
@endif
</script>
@endsection 