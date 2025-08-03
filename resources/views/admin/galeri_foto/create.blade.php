@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Foto Galeri</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('galeri-foto.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Foto</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="album_id" class="form-label">Album</label>
            <select name="album_id" id="album_id" class="form-control" required>
                <option value="">-- Pilih Album --</option>
                @foreach($albums as $album)
                    <option value="{{ $album->id }}"
                        @if(request('album_id'))
                            {{ request('album_id') == $album->id ? 'selected' : '' }}
                        @elseif(count($albums) === 1)
                            selected
                        @endif
                    >{{ $album->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input class="form-control" type="file" id="gambar" name="gambar" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('galeri-foto.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection 