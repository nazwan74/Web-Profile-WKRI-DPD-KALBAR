@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Kelola Video</h1>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
        <table class="table table-bordered">
        <thead>
            <tr>
                <th>Video</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
            <tr>
                <td>
                    <video width="200" controls>
                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                        Browser Anda tidak mendukung video.
                    </video>
                </td>
                <td>{{ $video->deskripsi }}</td>
                <td>
                    <a href="{{ route('video.edit', $video->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('video.destroy', $video->id) }}" method="POST" class="form-hapus" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-hapus">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
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