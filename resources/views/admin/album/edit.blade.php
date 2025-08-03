@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Album</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('album.update', $album->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Album</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $album->nama) }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $album->deskripsi) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('album.index') }}" class="btn btn-secondary">Batal</a>
    </form>
    @if(isset($fotos) && $fotos->count())
<div class="mt-5">
    <h4 class="mb-3">Foto dalam Album Ini</h4>
    <div class="row">
        @foreach($fotos as $foto)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/'.$foto->gambar) }}" class="card-img-top" alt="Foto Galeri">
                    <div class="card-body">
                        <div class="fw-bold">{{ $foto->judul }}</div>
                        <form action="{{ route('galeri-foto.destroy', $foto->id) }}" method="POST" class="form-hapus" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mt-2 btn-hapus">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif
</div>
@endsection 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('.form-hapus');
    forms.forEach(function(form) {
        form.querySelector('.btn-hapus').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data yang dihapus tidak dapat dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script> 