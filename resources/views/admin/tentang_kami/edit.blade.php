@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Tentang Kami</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.tentang-kami.update', $tentangKami->id) }}" method="POST" enctype="multipart/form-data" id="editForm" onsubmit="console.log('Form submitted with data:', new FormData(this));">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="logo" class="form-label">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control @error('logo') is-invalid @enderror" accept="image/*">
                                    @error('logo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB.</small>
                                    
                                    @if($tentangKamiImage->logo)
                                        <div class="mt-3">
                                            <label class="form-label">Logo Saat Ini:</label>
                                            <div class="border rounded p-2">
                                                <img src="{{ asset('storage/' . $tentangKamiImage->logo) }}" 
                                                     alt="Logo WKRI Saat Ini" 
                                                     class="img-fluid" 
                                                     style="max-width: 200px; height: auto;">
                                            </div>

                                        </div>
                                    @else
                                        <div class="mt-3">
                                            <div class="alert alert-warning">
                                                <small>Belum ada logo yang diupload</small>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="filosofi_logo" class="form-label">Filosofi Logo <span class="text-danger">*</span></label>
                                    <textarea name="filosofi_logo" id="filosofi_logo" rows="8" class="form-control @error('filosofi_logo') is-invalid @enderror" required>{{ old('filosofi_logo', $tentangKami->filosofi_logo) }}</textarea>
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
                                    <textarea name="tentang_kami" id="tentang_kami" rows="8" class="form-control @error('tentang_kami') is-invalid @enderror" required>{{ old('tentang_kami', $tentangKami->tentang_kami) }}</textarea>
                                    @error('tentang_kami')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="sejarah" class="form-label">Sejarah <span class="text-danger">*</span></label>
                                    <textarea name="sejarah" id="sejarah" rows="8" class="form-control @error('sejarah') is-invalid @enderror" required>{{ old('sejarah', $tentangKami->sejarah) }}</textarea>
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
                                    <textarea name="doa_santa_anna" id="doa_santa_anna" rows="8" class="form-control @error('doa_santa_anna') is-invalid @enderror">{{ old('doa_santa_anna', $tentangKami->doa_santa_anna) }}</textarea>
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
                                    
                                    @if($tentangKamiImage->struktur_organisasi)
                                        <div class="mt-3">
                                            <label class="form-label">Gambar Saat Ini:</label>
                                            <div class="border rounded p-2">
                                                <img src="{{ asset('storage/' . $tentangKamiImage->struktur_organisasi) }}" 
                                                     alt="Struktur Organisasi Saat Ini" 
                                                     class="img-fluid" 
                                                     style="max-width: 100%; height: auto;">
                                            </div>

                                        </div>
                                    @else
                                        <div class="mt-3">
                                            <div class="alert alert-warning">
                                                <small>Belum ada gambar struktur organisasi yang diupload</small>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="{{ route('admin.tentang-kami.index') }}" class="btn btn-secondary me-2">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Perubahan
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
// SweetAlert untuk konfirmasi simpan - versi sederhana
document.getElementById('editForm').addEventListener('submit', function(e) {
    console.log('Form submission started');
    
    // Check if there are file inputs with files
    const fileInputs = this.querySelectorAll('input[type="file"]');
    let hasFiles = false;
    
    fileInputs.forEach(input => {
        if (input.files.length > 0) {
            hasFiles = true;
            console.log('File found:', input.name, input.files[0].name);
        }
    });
    
    console.log('Has files:', hasFiles);
    
    // If no files are being uploaded, show confirmation
    if (!hasFiles) {
        e.preventDefault();
        console.log('Showing confirmation dialog');
        
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Apakah Anda yakin ingin menyimpan perubahan?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log('Form submitted after confirmation');
                this.submit();
            }
        });
    } else {
        console.log('Form submitted directly with files');
        // If files are being uploaded, submit directly without confirmation
    }
});
</script>
@endsection 