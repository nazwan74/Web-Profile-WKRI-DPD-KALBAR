<?php

namespace App\Http\Controllers;

use App\Models\GaleriFoto;
use Illuminate\Http\Request;
use App\Models\Album;

class AdminGaleriFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos = GaleriFoto::orderBy('created_at', 'desc')->get();
        return view('admin.galeri_foto.index', compact('fotos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $albums = Album::orderBy('nama')->get();
        return view('admin.galeri_foto.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'album_id' => 'required|exists:albums,id',
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $validated['gambar'] = $request->file('gambar')->store('galeri_foto', 'public');
        GaleriFoto::create($validated);
        return redirect()->route('album.index')->with('success', 'Foto berhasil ditambahkan!');
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
        $foto = GaleriFoto::findOrFail($id);
        $albums = Album::orderBy('nama')->get();
        return view('admin.galeri_foto.edit', compact('foto', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $foto = GaleriFoto::findOrFail($id);
        $validated = $request->validate([
            'album_id' => 'required|exists:albums,id',
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($foto->gambar) {
                \Storage::disk('public')->delete($foto->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('galeri_foto', 'public');
        } else {
            unset($validated['gambar']);
        }
        $foto->update($validated);
        return redirect()->route('album.index')->with('success', 'Foto berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $foto = GaleriFoto::findOrFail($id);
        if ($foto->gambar) {
            \Storage::disk('public')->delete($foto->gambar);
        }
        $foto->delete();
        return redirect()->route('galeri-foto.index')->with('success', 'Foto berhasil dihapus!');
    }
}
