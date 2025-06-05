<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('slider.create');
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
    Slider::create($input);

    return redirect('/sliders')->with('message', 'Data slider berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
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
    $slider->update($input);

    return redirect('/sliders')->with('message', 'Data slider berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
     // Hapus file gambar jika ada dan file benar-benar ada di folder public/image
    if ($slider->image && file_exists(public_path('image/' . $slider->image))) {
        unlink(public_path('image/' . $slider->image));
    }

    // Hapus data slider dari database
    $slider->delete();

    // Redirect ke halaman slider dengan pesan sukses
    return redirect('/sliders')->with('message', 'Data slider berhasil dihapus!');
    }
}
