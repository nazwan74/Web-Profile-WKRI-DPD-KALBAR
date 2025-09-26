<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Video</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/beranda">
            <img src="/images/logo3.png" alt="Logo WKRI" height="40" class="d-inline-block align-text-top me-2">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item mx-2">
                    <a class="nav-link" href="/beranda">Home</a>
                </li>
                                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('tentang-kami.index') }}">Tentang Kami</a>
                    </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('artikel.list') }}">Artikel</a>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('kegiatan.list') }}">Kegiatan</a>
                </li>
                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle active" href="#" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Galeri
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="galeriDropdown">
                        <li><a class="dropdown-item" href="{{ route('galeri.album') }}">Foto</a></li>
                        <li><a class="dropdown-item active" href="{{ route('galeri.video') }}">Video</a></li>
                    </ul>
                </li>
                <li class="nav-item mx-2">
                    <a class="nav-link" href="{{ route('kontak.index') }}">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container my-5">
    <h2 class="fw-bold mb-4">Galeri Video</h2>
    <div class="row">
        @forelse($videos as $video)
            <div class="col-md-6 mb-4 d-flex justify-content-center">
                <div class="tilted-card video-card" style="width:100%; max-width:480px; height:270px;">
                    <div class="tilted-card-inner" style="width:100%; height:100%;">
                        <img src="{{ $video->thumbnail ? asset('storage/' . $video->thumbnail) : '/images/logo3.png' }}" class="tilted-card-img video-thumb" style="width:100%; height:100%; object-fit:cover;" alt="Thumbnail Video">
                        <div class="tilted-card-overlay play-overlay" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalVideo{{ $video->id }}">
                            <span class="tilted-card-play" style="font-size:2.5rem;"><i class="bi bi-play-circle-fill"></i></span>
                            <p class="tilted-card-caption">{{ $video->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Video -->
            <div class="modal fade" id="modalVideo{{ $video->id }}" tabindex="-1" aria-labelledby="modalVideoLabel{{ $video->id }}" aria-hidden="true">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content bg-dark">
                  <div class="modal-body p-0">
                    <video src="{{ asset('storage/' . $video->video_path) }}" controls style="width:100%; height:auto;"></video>
                  </div>
                </div>
              </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">Belum ada video di galeri.</div>
            </div>
        @endforelse
    </div>
</div>
<style>
.tilted-card {
  perspective: 1000px;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 8px 32px rgba(0,0,0,0.18);
  transition: box-shadow 0.3s;
  position: relative;
  background: #222;
  height: 100%;
  width: 100%;
}
.tilted-card-inner {
  height: 100%;
  width: 100%;
  transition: transform 0.3s cubic-bezier(.25,.8,.25,1), box-shadow 0.3s;
  will-change: transform;
  position: relative;
}
.tilted-card-img {
  display: block;
  width: 100%;
  height: 100%;
  border-radius: 16px;
  object-fit: cover;
  transition: filter 0.3s;
}
.tilted-card-overlay {
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0,0,0,0.45);
  color: #fff;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  align-items: center;
  opacity: 0;
  transition: opacity 0.3s;
  padding: 24px 12px;
  pointer-events: none;
}
.tilted-card:hover .tilted-card-overlay,
.tilted-card:focus .tilted-card-overlay {
  opacity: 1;
  pointer-events: auto;
}
.tilted-card-caption {
  font-size: 1.1rem;
  font-weight: bold;
  margin-bottom: 8px;
  text-align: center;
  text-shadow: 0 2px 8px rgba(0,0,0,0.5);
}
.tilted-card-play {
  font-size: 2.5rem;
  color: #ffb300;
  margin-bottom: 8px;
}
.tilted-card:hover .tilted-card-img {
  filter: brightness(0.7) blur(1px);
}
</style>
<script>
document.querySelectorAll('.tilted-card').forEach(function(card) {
  const inner = card.querySelector('.tilted-card-inner');
  const rotateAmplitude = 12;
  if(window.innerWidth < 600) return;
  card.addEventListener('mousemove', function(e) {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    const rotateX = ((y - centerY) / centerY) * rotateAmplitude;
    const rotateY = ((x - centerX) / centerX) * -rotateAmplitude;
    inner.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.08)`;
  });
  card.addEventListener('mouseleave', function() {
    inner.style.transform = 'rotateX(0deg) rotateY(0deg) scale(1)';
  });
  card.addEventListener('mouseenter', function() {
    inner.style.transition = 'transform 0.2s cubic-bezier(.25,.8,.25,1)';
  });
});
document.querySelectorAll('.video-card').forEach(function(card) {
    const overlay = card.querySelector('.play-overlay');
    overlay.addEventListener('click', function() {
        // Hapus thumbnail
        const thumb = card.querySelector('.video-thumb');
        if (thumb) thumb.remove();

        // Hapus overlay play
        overlay.style.display = 'none';

        // Tambahkan elemen video
        const video = document.createElement('video');
        video.className = 'tilted-card-img';
        video.style.width = '100%';
        video.style.height = '100%';
        video.style.objectFit = 'cover';
        video.setAttribute('controls', 'controls');
        video.setAttribute('autoplay', 'autoplay');
        video.setAttribute('poster', card.getAttribute('data-poster'));
        const source = document.createElement('source');
        source.src = card.getAttribute('data-video-src');
        source.type = 'video/mp4';
        video.appendChild(source);

        card.querySelector('.tilted-card-inner').prepend(video);

        // Pause video lain jika ada yang sedang play
        document.querySelectorAll('.video-card video').forEach(function(v) {
            if (v !== video) v.pause();
        });
    });
});
document.querySelectorAll('.modal').forEach(function(modal) {
    modal.addEventListener('shown.bs.modal', function () {
        var video = modal.querySelector('video');
        if (video) {
            video.currentTime = 0; // Mulai dari awal setiap kali modal dibuka
        }
    });
    modal.addEventListener('hidden.bs.modal', function () {
        var video = modal.querySelector('video');
        if (video) {
            video.pause();
            video.currentTime = 0; // Reset ke awal setiap kali modal ditutup
        }
    });
});
</script>
@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 