<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TentangKami;
use App\Models\TentangKamiImage;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentangKami = TentangKami::first();
        $tentangKamiImage = TentangKamiImage::first();
        return view('tentang_kami.index', compact('tentangKami', 'tentangKamiImage'));
    }
}
