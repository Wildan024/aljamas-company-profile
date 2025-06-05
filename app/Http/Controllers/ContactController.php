<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = contact::first();


        return view('contact', compact('contact'));
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
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, contact $contact)
    {
         // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'alamat' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string',
            'maps_embed' => 'required|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp',
        ]);

        // // Ambil data contact berdasarkan ID, jika tidak ditemukan maka akan menampilkan error 404
        // $contact = Contact::findOrFail($id);

        // Simpan data inputan
        $contact->name = $request->name; // Nama perusahaan
        $contact->description = $request->description; // Deskripsi perusahaan
        $contact->alamat = $request->alamat; // Alamat
        $contact->email = $request->email; // Email
        $contact->telepon = $request->telepon; // Nomor telepon
        $contact->maps_embed = $request->maps_embed; // Embed Maps

        // Jika ada file logo diupload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/contact'), $filename);

            // Hapus logo lama jika ada
            if ($contact->logo && file_exists(public_path('uploads/contact/' . $contact->logo))) {
                unlink(public_path('uploads/contact/' . $contact->logo));
            }

            $contact->logo = $filename;
        }

        $contact->save();

        return redirect()->back()->with('message', 'Data contact berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {
        //
    }
}
