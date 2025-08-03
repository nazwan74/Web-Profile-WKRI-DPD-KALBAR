@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Kelola Album</h1>
    </div>
    
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Album</th>
                    <th>Deskripsi</th>
                    <th>Jumlah Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($albums as $album)
                <tr>
                    <td>{{ $album->nama }}</td>
                    <td>{{ $album->deskripsi }}</td>
                    <td>{{ $album->fotos->count() }}</td>
                    <td>
                        <a href="{{ route('album.edit', $album->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('album.destroy', $album->id) }}" method="POST" class="form-hapus" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-5">Belum ada album.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
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