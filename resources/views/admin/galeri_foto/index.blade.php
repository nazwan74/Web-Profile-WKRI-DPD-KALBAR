@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Kelola Foto Galeri</h1>
    </div>
    
        <div class="row">
        @forelse($fotos as $foto)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/'.$foto->gambar) }}" class="card-img-top" alt="Foto Galeri">
                    <div class="card-body">
                        <div class="fw-bold">{{ $foto->judul }}</div>
                        <a href="{{ route('galeri-foto.edit', $foto->id) }}" class="btn btn-warning btn-sm mt-2">Edit</a>
                        <form action="{{ route('galeri-foto.destroy', $foto->id) }}" method="POST" class="form-hapus" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-hapus" onclick="return false;">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted py-5">Belum ada foto galeri.</div>
        @endforelse
    </div>
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