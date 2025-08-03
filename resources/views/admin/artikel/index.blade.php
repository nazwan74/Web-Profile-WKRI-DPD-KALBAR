@extends('layouts.app')
@section('title', 'Daftar Artikel')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Kelola Artikel</h1>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('artikel.create') }}" class="btn btn-primary mb-3">Tambah Artikel</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($artikels as $artikel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $artikel->judul }}</td>
                <td>{{ $artikel->created_at->format('d-m-Y') }}</td>
                <td>
                    @if($artikel->gambar)
                        <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="Gambar" width="80">
                    @else
                        -
                    @endif
                </td>
                <td>
                    <a href="{{ route('artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('artikel.destroy', $artikel->id) }}" method="POST" class="form-hapus" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada artikel.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
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
@endsection 