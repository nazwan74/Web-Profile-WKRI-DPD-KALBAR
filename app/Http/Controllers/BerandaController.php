<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Carousel;
use App\Models\Kegiatan;
use App\Models\Video;

class BerandaController extends Controller
{
    public function index()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->take(4)->get();
        $carousels = Carousel::all();
        $kegiatans = Kegiatan::orderBy('created_at', 'desc')->take(6)->get(); // ambil 6 kegiatan terbaru
        $videos_beranda = \App\Models\Video::orderBy('created_at', 'desc')->take(6)->get();
        return view('Beranda', compact('artikels', 'carousels', 'kegiatans', 'videos_beranda'));
    }

    public function show($id)
    {
        $artikel = \App\Models\Artikel::findOrFail($id);
        $artikels_lain = \App\Models\Artikel::where('id', '!=', $id)->orderBy('created_at', 'desc')->take(3)->get();
        return view('artikel.show', compact('artikel', 'artikels_lain'));
    }

    public function listArtikel()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->paginate(9);
        return view('artikel.index', compact('artikels'));
    }

    public function listKegiatan()
    {
        $kegiatans = \App\Models\Kegiatan::orderBy('created_at', 'desc')->paginate(9);
        return view('kegiatan.index', compact('kegiatans'));
    }

    public function showKegiatan($id)
    {
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        $kegiatans_lain = \App\Models\Kegiatan::where('id', '!=', $id)->orderBy('created_at', 'desc')->take(3)->get();
        return view('kegiatan.show', compact('kegiatan', 'kegiatans_lain'));
    }

    public function albumPublic()
    {
        $albums = \App\Models\Album::with('fotos')->orderBy('created_at', 'desc')->get();
        return view('galeri.foto', compact('albums'));
    }

    public function albumShowPublic($id)
    {
        $album = \App\Models\Album::with('fotos')->findOrFail($id);
        return view('galeri.album_show', compact('album'));
    }

    public function galeriVideo()
    {
        $videos = Video::orderBy('created_at', 'desc')->get();
        return view('galeri.video', compact('videos'));
    }
}
