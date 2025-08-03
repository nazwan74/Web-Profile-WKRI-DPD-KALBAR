@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Video</h1>
    <form action="{{ route('video.update', $video->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Video Saat Ini:</label><br>
            <video width="300" controls>
                <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        </div>
        <div class="mb-3">
            <label for="video" class="form-label">Ganti File Video (opsional)</label>
            <input type="file" name="video" id="video" class="form-control @error('video') is-invalid @enderror">
            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Thumbnail Saat Ini:</label><br>
            @if($video->thumbnail)
                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="Thumbnail" style="max-width:180px; max-height:120px; border-radius:8px;">
            @else
                <span class="text-muted">Belum ada thumbnail</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Ganti Thumbnail (opsional, jpg/png, max 2MB)</label>
            <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" accept="image/jpeg,image/png">
            @error('thumbnail')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $video->deskripsi) }}</textarea>
            @error('deskripsi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('video.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 