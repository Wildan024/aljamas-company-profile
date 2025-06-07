<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::all(); // Mengambil semua data artikel

        return view('artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Maks 5MB
        ]);

        $input = $request->all();

        // Menyimpan gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'image/'; // Pastikan folder 'public/image' ada
            $imageName = date('YmdHis') . '_' . $image->getClientOriginalName(); // Nama unik
            $image->move(public_path($destinationPath), $imageName);
            $input['image'] = $imageName;
        }

        // Simpan ke database
        Artikel::create($input);

        return redirect()->route('artikel.index')->with('message', 'Data artikel berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel) 
    {
        // Jika Anda ingin menampilkan detail artikel, Anda bisa return view di sini
        // Contoh: return view('artikel.show', compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel) 
    {
        // Variabel $artikel sudah otomatis tersedia berkat Route Model Binding
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel) 
    {
        // Validasi input
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120', // Gambar tidak wajib diubah
        ]);

        $input = $request->all();

        // Menyimpan gambar baru jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada dan file benar-benar ada di folder public/image
            if ($artikel->image && File::exists(public_path('image/' . $artikel->image))) {
                File::delete(public_path('image/' . $artikel->image));
            }

            $image = $request->file('image');
            $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
            $destinationPath = 'image/';
            $image->move(public_path($destinationPath), $imageName);
            $input['image'] = $imageName;
        } else {
            // Jika tidak ada gambar baru yang diunggah, pertahankan gambar lama dari $artikel yang sudah ada
            $input['image'] = $artikel->image;
        }

        // Update data ke database
        $artikel->update($input);

        return redirect()->route('artikel.index')->with('message', 'Data artikel berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel) 
    {
        // Hapus file gambar jika ada dan file benar-benar ada di folder public/image
        if ($artikel->image && File::exists(public_path('image/' . $artikel->image))) {
            File::delete(public_path('image/' . $artikel->image));
        }

        // Hapus data artikel dari database
        $artikel->delete();

        // Redirect ke halaman artikel dengan pesan sukses
        return redirect()->route('artikel.index')->with('message', 'Data artikel berhasil dihapus!');
    }
}