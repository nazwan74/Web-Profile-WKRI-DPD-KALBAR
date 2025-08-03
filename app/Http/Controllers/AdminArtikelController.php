<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class AdminArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua artikel terbaru, urutkan dari yang terbaru
        $artikels = Artikel::orderBy('created_at', 'desc')->get();
        // Kirim ke view admin.artikel.index
        return view('admin.artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form tambah artikel
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload gambar jika ada
        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        // Simpan artikel baru
        $artikel = new \App\Models\Artikel();
        $artikel->judul = $validated['judul'];
        $artikel->isi = $validated['isi'];
        $artikel->gambar = $gambarPath;
        $artikel->save();

        // Redirect ke daftar artikel dengan pesan sukses
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Cari artikel berdasarkan id
        $artikel = \App\Models\Artikel::findOrFail($id);
        // Tampilkan form edit
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Cari artikel
        $artikel = \App\Models\Artikel::findOrFail($id);
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Proses upload gambar jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar && \Storage::disk('public')->exists($artikel->gambar)) {
                \Storage::disk('public')->delete($artikel->gambar);
            }
            $artikel->gambar = $request->file('gambar')->store('artikel', 'public');
        }

        // Update data artikel
        $artikel->judul = $validated['judul'];
        $artikel->isi = $validated['isi'];
        $artikel->save();

        // Redirect ke daftar artikel dengan pesan sukses
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artikel = \App\Models\Artikel::findOrFail($id);
        // Hapus gambar jika ada
        if ($artikel->gambar && \Storage::disk('public')->exists($artikel->gambar)) {
            \Storage::disk('public')->delete($artikel->gambar);
        }
        $artikel->delete();
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
