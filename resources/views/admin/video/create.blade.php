@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Tambah Video</h1>
    <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="video" class="form-label">File Video (mp4, max 50MB)</label>
            <input type="file" name="video" id="video" class="form-control @error('video') is-invalid @enderror" required>
            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail (opsional, jpg/png, max 2MB)</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/jpeg,image/png">
            @error('thumbnail')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi') }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('video.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 