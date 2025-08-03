<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carousels = Carousel::all();
        return view('admin.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('carousel', 'public');
        Carousel::create([
            'image' => $path,
            'caption' => $request->caption,
        ]);

        return redirect()->route('carousel.index')->with('success', 'Gambar carousel berhasil ditambahkan.');
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
    public function edit(Carousel $carousel)
    {
        return view('admin.carousel.edit', compact('carousel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $carousel)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'caption' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($carousel->image && Storage::disk('public')->exists($carousel->image)) {
                Storage::disk('public')->delete($carousel->image);
            }
            $path = $request->file('image')->store('carousel', 'public');
            $carousel->image = $path;
        }
        $carousel->caption = $request->caption;
        $carousel->save();

        return redirect()->route('carousel.index')->with('success', 'Gambar carousel berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $carousel)
    {
        if ($carousel->image && Storage::disk('public')->exists($carousel->image)) {
            Storage::disk('public')->delete($carousel->image);
        }
        $carousel->delete();
        return redirect()->route('carousel.index')->with('success', 'Gambar carousel berhasil dihapus.');
    }
}
