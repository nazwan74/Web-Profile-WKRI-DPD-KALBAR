<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <!-- Memasukkan CSS Bootstrap dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Memasukkan JS Bootstrap dari CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    @keyframes wipeUp {
      0% {
        opacity: 0;
        transform: translateY(60px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .wipe-up {
      animation: wipeUp 1s ease;
    }
    @keyframes wipeDown {
      0% {
        opacity: 1;
        transform: translateY(0);
      }
      100% {
        opacity: 0;
        transform: translateY(60px);
      }
    }
    .wipe-down {
      animation: wipeDown 1s ease;
    }
    .carousel-indicators {
      flex-direction: column;
      position: absolute;
      right: 2%;
      top: 50%;
      left: auto;
      bottom: auto;
      transform: translateY(-50%);
      margin: 0;
      z-index: 2;
    }
    .carousel-indicators [data-bs-target] {
      background-color: #fff;
      opacity: 0.7;
      width: 14px;
      height: 14px;
      border-radius: 50%;
      margin: 6px 0;
      border: none;
      transition: opacity 0.2s, background 0.2s;
      box-shadow: 0 1px 4px rgba(0,0,0,0.15);
    }
    .carousel-indicators .active {
      background-color: #ff5722;
      opacity: 1;
    }
    @keyframes lateIn {
      0% {
        opacity: 0;
        transform: translateX(60px) scale(1.05);
      }
      100% {
        opacity: 1;
        transform: translateX(0) scale(1);
      }
    }
    .carousel-fade .carousel-item.active .carousel-img-late {
      animation: lateIn 2s cubic-bezier(0.4, 0, 0.2, 1);
    }
    /* Animasi geser kiri ke kanan untuk judul artikel terbaru */
    @keyframes slideInRight {
      0% {
        opacity: 0;
        transform: translateX(60px);
      }
      100% {
        opacity: 1;
        transform: translateX(0);
      }
    }
    .slide-in-right {
      animation: slideInRight 1.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .carousel-fade .carousel-item {
      opacity: 0;
      position: absolute;
      top: 0; left: 0; width: 100%; height: 100%;
      transition: opacity 1.2s cubic-bezier(0.4,0,0.2,1);
      background: transparent !important;
      will-change: opacity;
    }
    .carousel-fade .carousel-item.active,
    .carousel-fade .carousel-item-next.carousel-item-start,
    .carousel-fade .carousel-item-prev.carousel-item-end {
      opacity: 1;
      position: relative;
      z-index: 1;
      background: transparent !important;
    }
    .carousel-fade .carousel-item .carousel-img-late {
      transition: transform 1.2s cubic-bezier(0.4,0,0.2,1), filter 1.2s cubic-bezier(0.4,0,0.2,1);
      will-change: transform, filter;
    }
    .kegiatan-title-link:hover {
        color: #ff5722;
        text-decoration: underline;
    }
    </style>
    @foreach($carousels as $carousel)
      <link rel="preload" as="image" href="{{ asset('storage/'.$carousel->image) }}">
    @endforeach
</head>
<body>
    <!-- Navbar Bootstrap mirip contoh gambar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
        <div class="container">
            <!-- Logo dan Nama Organisasi -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/images/logo3.png" alt="Logo WKRI" height="40" class="d-inline-block align-text-top me-2">
            </a>
            <!-- Toggle untuk mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Menu Navbar -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a class="nav-link active" href="/beranda">Home</a>
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
                        <a class="nav-link dropdown-toggle" href="#" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Galeri
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="galeriDropdown">
                            <li><a class="dropdown-item" href="{{ route('galeri.album') }}">Foto</a></li>
                            <li><a class="dropdown-item" href="{{ route('galeri.video') }}">Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="{{ route('kontak.index') }}">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Carousel Selamat Datang -->
    <div id="welcomeCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
        <div class="carousel-inner">
            @if($carousels->count())
                @foreach($carousels as $index => $carousel)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }} position-relative">
                        <img src="{{ asset('storage/'.$carousel->image) }}" class="d-block w-100 carousel-img-late" alt="Foto Carousel" style="width: 100%; height: auto; object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100" style="background: rgba(0,0,0,0.4); left:0; right:0; top:0; bottom:0;">
                            <h2 class="fw-bold text-white wipe-up" style="white-space: pre-line;">{!! $carousel->caption !!}</h2>
                        </div>
                    </div>
                @endforeach
                @else
                    <div class="carousel-item active d-flex justify-content-center align-items-center" style="height: 300px; background-color: #f8f9fa;">
                        <h4 class="text-muted">Banner Belum Di Buat</h4>
                    </div>
                @endif
        </div>
        @if($carousels->count() > 1)
        <!-- Tombol navigasi carousel -->
        <button class="carousel-control-prev" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        @endif
    </div>
    <!-- Akhir Carousel -->

    <!-- Section Artikel Terbaru -->
    <div class="container my-5">
        <h3 class="mb-4 fw-bold text-center">Artikel Terbaru</h3>
        @if($artikels->count())
            <div id="artikelCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" style="max-width:1140px; margin:auto; height:540px;">
                <!-- Carousel Indicators (Dots) -->
                <div class="carousel-indicators" style="right: 2%; left: auto; top: 50%; bottom: auto; flex-direction: column; transform: translateY(-50%);">
                    @foreach($artikels->reverse()->values() as $index => $artikel)
                        <button type="button"
                            data-bs-target="#artikelCarousel"
                            data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}"
                            aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                            aria-label="Slide {{ $index + 1 }}"
                            style="width: 14px; height: 14px; border-radius: 50%; margin: 6px 0; border: none; background: #fff; opacity: 0.7;">
                        </button>
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach($artikels->reverse()->values() as $index => $artikel)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="position-relative" style="width:1140px; height:540px; border-radius: 16px; overflow: hidden; margin:auto;">
                                @if($artikel->gambar)
                                    <img src="{{ asset('storage/'.$artikel->gambar) }}" class="d-block w-100" alt="Gambar Artikel" style="width:1140px; height:540px; object-fit: cover; filter: brightness(0.7);">
                                @endif
                                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(90deg, rgba(0,123,167,0.7) 0%, rgba(0,123,167,0.3) 100%);"></div>
                                <div class="carousel-caption text-start" style="top: 50%; left: 0; right: auto; bottom: auto; transform: translateY(-50%); text-align: left; max-width: 500px; width: 50%; padding-left: 40px; text-shadow: 0 2px 8px rgba(0,0,0,0.5);">
                                    <span class="badge bg-danger mb-2 slide-anim slide-in-right">ARTIKEL</span>
                                    <h2 class="fw-bold artikel-title slide-anim slide-in-right" style="font-size:2.5rem;">
                                        <a href="{{ route('artikel.show', $artikel->id) }}" style="color:inherit; text-decoration:underline; cursor:pointer;">{{ $artikel->judul }}</a>
                                    </h2>
                                    <div class="fw-bold slide-anim slide-in-right">BY {{ strtoupper($artikel->user->name ?? 'ADMIN') }} {{ $artikel->created_at ? $artikel->created_at->format('d/m/Y') : '' }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center py-5">
                <p class="text-muted mb-0">Tidak ada artikel terbaru.</p>
            </div>
        @endif
    </div>
    <!-- Akhir Section Artikel Terbaru -->

    <!-- Section Kegiatan Terbaru -->
    <div class="container my-5">
        <h3 class="mb-4 fw-bold">Kegiatan Terbaru</h3>
        <div class="row">
            @forelse($kegiatans->chunk(2) as $row)
                @foreach($row as $kegiatan)
                    <div class="col-md-6 mb-4">
                        <div class="d-flex align-items-start" style="gap:16px;">
                            <img src="{{ $kegiatan->gambar ? asset('storage/'.$kegiatan->gambar) : '/images/logo3.png' }}" alt="Gambar Kegiatan" style="width:110px; height:80px; object-fit:cover; border-radius:6px;">
                            <div>
                                <a href="/kegiatan/{{ $kegiatan->id }}" class="fw-bold kegiatan-title-link" style="font-size:1.1rem; color:#222; text-decoration:none;">
                                    {{ $kegiatan->judul }}
                                </a>
                                <div class="text-muted" style="font-size:0.98em; margin:2px 0 4px 0;">
                                    <i class="bi bi-clock"></i> {{ $kegiatan->created_at ? $kegiatan->created_at->format('d/m/Y') : '' }}
                                </div>
                                <div style="font-size:0.98em; color:#444;">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($kegiatan->deskripsi), 80) }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada kegiatan terbaru.</p>
                </div>
            @endforelse
        </div>
    </div>
    <style>
    .kegiatan-title-link:hover {
        color: #ff5722;
        text-decoration: underline;
    }
    </style>
    <!-- Akhir Section Kabar Persyarikatan / Kegiatan Terbaru -->

    <!-- Section Video Terbaru -->
    <div class="container my-5">
        <h3 class="mb-4 fw-bold">Video Terbaru</h3>
        <div class="video-grid">
            @foreach($videos_beranda as $i => $video)
                <div class="video-grid-item{{ $i == 0 ? ' video-grid-item--featured' : '' }}">
                    <div class="tilted-card video-card" style="height:100%; width:100%;">
                        <div class="tilted-card-inner" style="height:100%; width:100%;">
                            @if($video->thumbnail)
                                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="Thumbnail Video" class="tilted-card-img" style="width:100%; height:100%; object-fit:cover;">
                            @else
                                <video class="tilted-card-img" style="width:100%; height:100%; object-fit:cover;" preload="metadata" poster="/images/logo3.png">
                                    <source src="{{ asset('storage/' . $video->video_path) }}#t=0.1" type="video/mp4">
                                </video>
                            @endif
                            <div class="tilted-card-overlay">
                                <p class="tilted-card-caption">{{ \Illuminate\Support\Str::limit($video->deskripsi, 80) }}</p>
                                <span class="tilted-card-play"><i class="bi bi-play-circle-fill"></i></span>
                            </div>
                        </div>
                        <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#modalVideo{{ $video->id }}"></a>
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
            @endforeach
        </div>
    </div>
    <!-- Akhir Section Video Terbaru -->
    @include('partials.footer')
</body>
</html>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var carousel = document.getElementById('welcomeCarousel');
  if (!carousel) return;

  function getActiveCaption() {
    var active = carousel.querySelector('.carousel-item.active .carousel-caption h2');
    return active;
  }

  carousel.addEventListener('slide.bs.carousel', function (e) {
    var oldCaption = getActiveCaption();
    if (oldCaption) {
      oldCaption.classList.remove('wipe-up');
      oldCaption.classList.add('wipe-down');
    }
  });

  carousel.addEventListener('slid.bs.carousel', function (e) {
    var newCaption = getActiveCaption();
    if (newCaption) {
      newCaption.classList.remove('wipe-down');
      void newCaption.offsetWidth; // trigger reflow
      newCaption.classList.add('wipe-up');
    }
  });

  // Inisialisasi animasi pada slide pertama
  var firstCaption = getActiveCaption();
  if (firstCaption) {
    firstCaption.classList.add('wipe-up');
  }

  // Animasi geser kiri ke kanan untuk carousel artikel terbaru
  var artikelCarousel = document.getElementById('artikelCarousel');
  if (artikelCarousel) {
    function getActiveArtikelTexts() {
      var active = artikelCarousel.querySelectorAll('.carousel-item.active .slide-anim');
      return active;
    }

    artikelCarousel.addEventListener('slide.bs.carousel', function (e) {
      var oldTexts = getActiveArtikelTexts();
      oldTexts.forEach(function(el) {
        el.classList.remove('slide-in-right');
        // Trigger reflow agar animasi bisa diulang
        void el.offsetWidth;
        el.classList.add('slide-in-right');
      });
    });
  }
});

// Pause video saat modal ditutup
    document.querySelectorAll('.modal').forEach(function(modal) {
        modal.addEventListener('hidden.bs.modal', function () {
            var video = modal.querySelector('video');
            if (video) {
                video.pause();
                video.currentTime = 0;
            }
        });
    });
</script>
<style>
.video-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-auto-rows: 180px;
  gap: 18px;
}
.video-grid-item {
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  height: 100%;
}
.video-grid-item--featured {
  grid-column: span 2;
  grid-row: span 2;
  min-height: 380px;
}
@media (max-width: 900px) {
  .video-grid {
    grid-template-columns: 1fr 1fr;
  }
  .video-grid-item--featured {
    grid-column: span 2;
    grid-row: span 1;
    min-height: 220px;
  }
}
@media (max-width: 600px) {
  .video-grid {
    grid-template-columns: 1fr;
  }
  .video-grid-item--featured {
    grid-column: span 1;
    grid-row: span 1;
    min-height: 180px;
  }
}
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
  margin-bottom: 12px;
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
@media (max-width: 400px) {
  .tilted-card, .tilted-card-inner, .tilted-card-img {
    width: 100% !important;
    height: 180px !important;
    min-width: 0;
    min-height: 0;
  }
}
</style>
<script>
document.querySelectorAll('.tilted-card').forEach(function(card) {
  const inner = card.querySelector('.tilted-card-inner');
  const rotateAmplitude = 12; // derajat
  // Nonaktifkan efek tilt di mobile
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
</script>