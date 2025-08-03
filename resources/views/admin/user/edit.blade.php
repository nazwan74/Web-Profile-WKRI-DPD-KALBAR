@extends('layouts.app')
@section('title', 'Edit Akun Admin')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Akun Admin</h1>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name', $user->name) }}" 
                                       placeholder="Masukkan nama lengkap"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email', $user->email) }}" 
                                       placeholder="Masukkan email"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru <span class="text-muted">(opsional)</span></label>
                                <div class="input-group">
                                    <input type="password" 
                                           class="form-control @error('password') is-invalid @enderror" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Kosongkan jika tidak ingin mengubah password">
                                    <button class="btn btn-outline-secondary" 
                                            type="button" 
                                            id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">
                                    Password minimal 8 karakter dengan kombinasi huruf besar, huruf kecil, angka, dan simbol.
                                </small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru <span class="text-muted">(opsional)</span></label>
                                <div class="input-group">
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirmation" 
                                           name="password_confirmation" 
                                           placeholder="Konfirmasi password baru">
                                    <button class="btn btn-outline-secondary" 
                                            type="button" 
                                            id="togglePasswordConfirmation">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($user->id === auth()->id())
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Perhatian:</strong> Anda sedang mengedit akun Anda sendiri. Perubahan akan langsung diterapkan.
                        </div>
                    @endif

                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>Informasi:</strong> Jika password dikosongkan, password lama akan tetap digunakan.
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Toggle password visibility
    const togglePassword = document.getElementById('togglePassword');
    const togglePasswordConfirmation = document.getElementById('togglePasswordConfirmation');
    const password = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password_confirmation');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        togglePassword.querySelector('i').classList.toggle('bi-eye');
        togglePassword.querySelector('i').classList.toggle('bi-eye-slash');
    });

    togglePasswordConfirmation.addEventListener('click', function() {
        const type = passwordConfirmation.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirmation.setAttribute('type', type);
        togglePasswordConfirmation.querySelector('i').classList.toggle('bi-eye');
        togglePasswordConfirmation.querySelector('i').classList.toggle('bi-eye-slash');
    });
});
</script>
@endpush 