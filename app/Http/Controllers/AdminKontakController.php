<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class AdminKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontaks = Kontak::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.kontak.index', compact('kontaks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kontak = Kontak::findOrFail($id);
        
        // Mark as read if unread
        if ($kontak->status === 'unread') {
            $kontak->update(['status' => 'read']);
        }
        
        return view('admin.kontak.show', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();
        
        return redirect()->route('admin.kontak.index')->with('success', 'Pesan kontak berhasil dihapus!');
    }

    /**
     * Mark message as read
     */
    public function markAsRead(string $id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->update(['status' => 'read']);
        
        return redirect()->route('admin.kontak.index')->with('success', 'Pesan ditandai sebagai dibaca!');
    }

    /**
     * Mark message as unread
     */
    public function markAsUnread(string $id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->update(['status' => 'unread']);
        
        return redirect()->route('admin.kontak.index')->with('success', 'Pesan ditandai sebagai belum dibaca!');
    }
}
