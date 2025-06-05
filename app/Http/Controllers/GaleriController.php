<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeris = galeri::all();

        return view('galeri.index', compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galeri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validasi input 
        $request->validate([
        'title' => 'required', 'description' => 'required', 'image' => 'required|image',
    ]);

    $input = $request ->all();

        // menyimpan gambar
         if ($request->hasFile('image')) {
        $image = $request->file('image');
        $destinationPath = 'image/';
        $imageName = date('Ymd') . '_' . $image->getClientOriginalName();
        $image->move(public_path($destinationPath), $imageName);
        $input['image'] = $imageName;
    }

    // simpan ke database
    Galeri::create($input);

    return redirect('/galeris')->with('message', 'Data galeri berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        return view('galeri.edit', compact('galeri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
     // validasi input 
        $request->validate([
        'title' => 'required', 
        'description' => 'required', 
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
    ]);

    $input = $request ->all();

        // menyimpan gambar
        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = date('YmdHis') . '_' . $image->getClientOriginalName();
        $destinationPath = public_path('image');
        $image->move($destinationPath, $imageName);
        $input['image'] = $imageName;
    } else {
        unset($input['image']);
    }

    // Update data ke database
    $galeri->update($input);

    return redirect('/galeris')->with('message', 'Data galeri berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
     // Hapus file gambar jika ada dan file benar-benar ada di folder public/image
    if ($galeri->image && file_exists(public_path('image/' . $galeri->image))) {
        unlink(public_path('image/' . $galeri->image));
    }

    // Hapus data galeri dari database
    $galeri->delete();

    // Redirect ke halaman galeri dengan pesan sukses
    return redirect('/galeris')->with('message', 'Data galeri berhasil dihapus!');
    }
}
