<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TentangKami;
use App\Models\TentangKamiImage;
use Illuminate\Support\Facades\Storage;

class AdminTentangKamiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tentangKami = TentangKami::first();
        $tentangKamiImage = TentangKamiImage::first();
        return view('admin.tentang_kami.index', compact('tentangKami', 'tentangKamiImage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tentang_kami.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'filosofi_logo' => 'required',
            'tentang_kami' => 'required',
            'sejarah' => 'required',
            'doa_santa_anna' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'struktur_organisasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $tentangKami = new TentangKami();
        $tentangKami->filosofi_logo = $request->filosofi_logo;
        $tentangKami->tentang_kami = $request->tentang_kami;
        $tentangKami->sejarah = $request->sejarah;
        $tentangKami->doa_santa_anna = $request->doa_santa_anna;

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = 'logo_' . time() . '.' . $logo->getClientOriginalExtension();
            $logo->storeAs('public/tentang_kami', $logoName);
            $tentangKami->logo = 'tentang_kami/' . $logoName;
        }

        // Handle struktur organisasi upload
        if ($request->hasFile('struktur_organisasi')) {
            $image = $request->file('struktur_organisasi');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/tentang_kami', $imageName);
            $tentangKami->struktur_organisasi = 'tentang_kami/' . $imageName;
        }

        $tentangKami->save();

        return redirect()->route('admin.tentang-kami.index')->with('success', 'Data Tentang Kami berhasil ditambahkan!');
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
    public function edit(string $id)
    {
        $tentangKami = TentangKami::findOrFail($id);
        $tentangKamiImage = TentangKamiImage::first();
        return view('admin.tentang_kami.edit', compact('tentangKami', 'tentangKamiImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            \Log::info('Update method called with data:', $request->all());
            
            // Validasi input
            $validated = $request->validate([
                'filosofi_logo' => 'required',
                'tentang_kami' => 'required',
                'sejarah' => 'required',
                'doa_santa_anna' => 'nullable',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'struktur_organisasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Cari data yang akan diupdate
            $tentangKami = TentangKami::findOrFail($id);
            
            // Update data teks
            $tentangKami->filosofi_logo = $validated['filosofi_logo'];
            $tentangKami->tentang_kami = $validated['tentang_kami'];
            $tentangKami->sejarah = $validated['sejarah'];
            $tentangKami->doa_santa_anna = $validated['doa_santa_anna'];
            $tentangKami->save();
            
            \Log::info('TentangKami updated:', [
                'id' => $tentangKami->id,
                'filosofi_logo' => $tentangKami->filosofi_logo,
                'tentang_kami' => $tentangKami->tentang_kami,
                'sejarah' => $tentangKami->sejarah,
                'doa_santa_anna' => $tentangKami->doa_santa_anna
            ]);

            // Handle images in separate table
            $tentangKamiImage = TentangKamiImage::first();
            if (!$tentangKamiImage) {
                $tentangKamiImage = new TentangKamiImage();
            }

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($tentangKamiImage->logo && Storage::disk('public')->exists($tentangKamiImage->logo)) {
                Storage::disk('public')->delete($tentangKamiImage->logo);
            }
            
            // Upload logo baru
            $tentangKamiImage->logo = $request->file('logo')->store('tentang_kami', 'public');
        }

        // Handle struktur organisasi upload
        if ($request->hasFile('struktur_organisasi')) {
            // Hapus gambar lama jika ada
            if ($tentangKamiImage->struktur_organisasi && Storage::disk('public')->exists($tentangKamiImage->struktur_organisasi)) {
                Storage::disk('public')->delete($tentangKamiImage->struktur_organisasi);
            }
            
            // Upload gambar baru
            $tentangKamiImage->struktur_organisasi = $request->file('struktur_organisasi')->store('tentang_kami', 'public');
        }

        // Simpan data gambar
        $tentangKamiImage->save();

        // Redirect ke daftar dengan pesan sukses
        return redirect()->route('admin.tentang-kami.index')->with('success', 'Data Tentang Kami berhasil diupdate!');
        
        } catch (\Exception $e) {
            \Log::error('Error in update method: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
