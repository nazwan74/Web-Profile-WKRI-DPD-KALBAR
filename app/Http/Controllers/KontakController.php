<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    /**
     * Display the contact form page.
     */
    public function index()
    {
        return view('kontak.index');
    }

    /**
     * Store a newly created contact message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'pesan' => 'required|string|max:1000',
        ]);

        Kontak::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'pesan' => $validated['pesan'],
            'status' => 'unread',
        ]);

        return redirect()->route('kontak.index')->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
