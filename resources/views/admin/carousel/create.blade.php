@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Tambah Gambar Carousel</h2>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Gambar <span class="text-danger">*</span></label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <textarea class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption">{{ old('caption') }}</textarea>
            @error('caption')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('carousel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
<script>
$(document).ready(function() {
  $('#caption').summernote({
    placeholder: 'Tulis caption di sini...',
    tabsize: 2,
    height: 120
  });
});
</script>
@endsection 