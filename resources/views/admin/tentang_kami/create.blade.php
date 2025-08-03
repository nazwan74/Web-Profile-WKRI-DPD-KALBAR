@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Tentang Kami</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tentang-kami.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB.</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="filosofi_logo" class="form-label">Filosofi Logo <span class="text-danger">*</span></label>
                                    <textarea name="filosofi_logo" id="filosofi_logo" rows="8" class="form-control @error('filosofi_logo') is-invalid @enderror" required>{{ old('filosofi_logo') }}</textarea>
                                    @error('filosofi_logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="tentang_kami" class="form-label">Tentang Kami <span class="text-danger">*</span></label>
                                    <textarea name="tentang_kami" id="tentang_kami" rows="8" class="form-control @error('tentang_kami') is-invalid @enderror" required>{{ old('tentang_kami') }}</textarea>
                                    @error('tentang_kami')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="sejarah" class="form-label">Sejarah <span class="text-danger">*</span></label>
                                    <textarea name="sejarah" id="sejarah" rows="8" class="form-control @error('sejarah') is-invalid @enderror" required>{{ old('sejarah') }}</textarea>
                                    @error('sejarah')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="doa_santa_anna" class="form-label">Doa Santa Anna</label>
                                    <textarea name="doa_santa_anna" id="doa_santa_anna" rows="8" class="form-control @error('doa_santa_anna') is-invalid @enderror">{{ old('doa_santa_anna') }}</textarea>
                                    @error('doa_santa_anna')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="struktur_organisasi" class="form-label">Struktur Organisasi</label>
                                    <input type="file" name="struktur_organisasi" id="struktur_organisasi" class="form-control @error('struktur_organisasi') is-invalid @enderror" accept="image/*">
                                    @error('struktur_organisasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB.</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.tentang-kami.index') }}" class="btn btn-secondary me-2">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// SweetAlert untuk konfirmasi simpan
document.querySelector('form').addEventListener('submit', function(e) {
    // Check if there are file inputs with files
    const fileInputs = this.querySelectorAll('input[type="file"]');
    let hasFiles = false;
    
    fileInputs.forEach(input => {
        if (input.files.length > 0) {
            hasFiles = true;
        }
    });
    
    // If no files are being uploaded, show confirmation
    if (!hasFiles) {
        e.preventDefault();
        
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menyimpan data?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        });
    }
    // If files are being uploaded, submit directly without confirmation
});
</script>
@endsection 