@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Kegiatan</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Kegiatan</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" required>{{ old('deskripsi') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Kegiatan</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (opsional)</label>
            <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
  $('#deskripsi').summernote({
    height: 200
  });
});
</script>
@endpush 