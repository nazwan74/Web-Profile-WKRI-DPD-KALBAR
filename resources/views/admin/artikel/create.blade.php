@extends('layouts.app')
@section('title', 'Tambah Artikel')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Tambah Artikel</h1>
    </div>
    
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2 class="mb-4">Tambah Artikel</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}" required>
        </div>
        <div class="mb-3">
            <label for="isi" class="form-label">Isi Artikel</label>
            <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi">{{ old('isi') }}</textarea>
            @error('isi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar (opsional)</label>
            <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
        </div>
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function() {
        $('#isi').summernote({
            placeholder: 'Tulis isi artikel di sini...',
            tabsize: 2,
            height: 250
        });
    });
</script>
@endpush 