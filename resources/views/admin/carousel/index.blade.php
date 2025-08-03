@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Kelola Gambar Carousel</h2>
    <a href="{{ route('carousel.create') }}" class="btn btn-primary mb-3">Tambah Gambar</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Caption</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($carousels as $carousel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/'.$carousel->image) }}" alt="carousel" width="120"></td>
                <td>{{ $carousel->caption }}</td>
                <td>
                    <a href="{{ route('carousel.edit', $carousel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('carousel.destroy', $carousel->id) }}" method="POST" class="form-hapus" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada gambar carousel.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
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