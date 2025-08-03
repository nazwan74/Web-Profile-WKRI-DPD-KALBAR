<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kegiatan;
use App\Models\Kontak;
use App\Models\GaleriFoto;
use App\Models\Video;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_artikel' => Artikel::count(),
            'total_kegiatan' => Kegiatan::count(),
            'total_kontak' => Kontak::count(),
            'total_foto' => GaleriFoto::count(),
            'total_video' => Video::count(),
            'pesan_terbaru' => Kontak::latest()->take(5)->get(),
            'artikel_terbaru' => Artikel::latest()->take(5)->get(),
        ];

        return view('admin.dashboard', $data);
    }
} 