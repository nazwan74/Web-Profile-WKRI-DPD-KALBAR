@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Foto Galeri</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('galeri-foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Foto</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $foto->judul) }}" required>
        </div>
        <div class="mb-3">
            <label for="album_id" class="form-label">Album</label>
            <select name="album_id" id="album_id" class="form-control" required>
                <option value="">-- Pilih Album --</option>
                @foreach($albums as $album)
                    <option value="{{ $album->id }}" @if($foto->album_id == $album->id) selected @endif>{{ $album->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            @if($foto->gambar)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$foto->gambar) }}" alt="Gambar Lama" width="120">
                </div>
            @endif
            <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('galeri-foto.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 