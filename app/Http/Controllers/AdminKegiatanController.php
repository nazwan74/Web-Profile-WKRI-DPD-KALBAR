<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = \App\Models\Kegiatan::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.kegiatan.index', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        \App\Models\Kegiatan::create($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
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
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kegiatan->gambar) {
                \Storage::disk('public')->delete($kegiatan->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('kegiatan', 'public');
        }

        $kegiatan->update($validated);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kegiatan = \App\Models\Kegiatan::findOrFail($id);
        if ($kegiatan->gambar) {
            \Storage::disk('public')->delete($kegiatan->gambar);
        }
        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }
}
