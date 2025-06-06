<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data 'About' untuk ditampilkan dalam daftar
        $abouts = about::all();

        // Mengembalikan view untuk daftar konten 'Tentang Kami'
        // View ini akan berada di resources/views/abouts.blade.php
        return view('abouts', compact('abouts'));
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
    // Validasi input untuk data baru
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $about = new About(); // Buat instance model About baru
        $about->title = $request->title;
        $about->description = $request->description;

        $about->save(); // Simpan data konten 'Tentang Kami' baru

        return redirect()->route('abouts.index')->with('message', 'Data Tentang Kami berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(about $about)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, about $about)
    {
            // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',

        ]);

        // Simpan data inputan ke objek $about yang di-inject oleh Laravel
        $about->title = $request->title;
        $about->description = $request->description;

        $about->save();

        return redirect()->route('abouts')->with('message', 'Data Tentang Kami berhasil diperbarui!');
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(about $about)
    {
        $about->delete(); // Hapus data konten 'Tentang Kami'

        return redirect()->route('abouts.index')->with('message', 'Data Tentang Kami berhasil dihapus!');
    }
}
