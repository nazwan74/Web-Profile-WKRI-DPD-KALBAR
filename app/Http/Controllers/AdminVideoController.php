<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::orderBy('created_at', 'desc')->get();
        return view('admin.video.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'video' => 'required|file|mimetypes:video/mp4|max:51200', // 50MB
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $path = $request->file('video')->store('video', 'public');
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('video_thumbnail', 'public');
        }
        Video::create([
            'video_path' => $path,
            'deskripsi' => $request->deskripsi,
            'thumbnail' => $thumbnailPath,
        ]);
        return redirect()->route('video.index')->with('success', 'Video berhasil diupload!');
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
        $video = Video::findOrFail($id);
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $validated = $request->validate([
            'video' => 'nullable|file|mimetypes:video/mp4|max:51200',
            'deskripsi' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($request->hasFile('video')) {
            if ($video->video_path && Storage::disk('public')->exists($video->video_path)) {
                Storage::disk('public')->delete($video->video_path);
            }
            $video->video_path = $request->file('video')->store('video', 'public');
        }
        if ($request->hasFile('thumbnail')) {
            if ($video->thumbnail && Storage::disk('public')->exists($video->thumbnail)) {
                Storage::disk('public')->delete($video->thumbnail);
            }
            $video->thumbnail = $request->file('thumbnail')->store('video_thumbnail', 'public');
        }
        $video->deskripsi = $request->deskripsi;
        $video->save();
        return redirect()->route('video.index')->with('success', 'Video berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        if ($video->video_path && Storage::disk('public')->exists($video->video_path)) {
            Storage::disk('public')->delete($video->video_path);
        }
        $video->delete();
        return redirect()->route('video.index')->with('success', 'Video berhasil dihapus!');
    }
}
