<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AdminAlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::withCount('fotos')->orderBy('created_at', 'desc')->get();
        return view('admin.album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.album.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);
        Album::create($validated);
        return redirect()->route('album.index')->with('success', 'Album berhasil ditambahkan!');
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
        $album = Album::findOrFail($id);
        $fotos = $album->fotos()->orderBy('created_at', 'desc')->get();
        return view('admin.album.edit', compact('album', 'fotos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $album = Album::findOrFail($id);
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);
        $album->update($validated);
        return redirect()->route('album.index')->with('success', 'Album berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();
        return redirect()->route('album.index')->with('success', 'Album berhasil dihapus!');
    }
}
