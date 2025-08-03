<?php

namespace App\Http\Controllers;

use App\Models\Album;

class GaleriController extends Controller
{
    public function albumPublic()
    {
        $albums = Album::with('fotos')->orderBy('created_at', 'desc')->get();
        return view('galeri.foto', compact('albums'));
    }
} 