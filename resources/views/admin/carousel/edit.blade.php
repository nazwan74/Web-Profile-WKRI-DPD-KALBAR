@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Gambar Carousel</h2>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <form action="{{ route('carousel.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Baru (opsional)</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @if($carousel->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/'.$carousel->image) }}" alt="carousel" width="180">
                </div>
            @endif
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <textarea class="form-control @error('caption') is-invalid @enderror" id="caption" name="caption">{{ old('caption', $carousel->caption) }}</textarea>
            @error('caption')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
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