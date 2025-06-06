<?php

namespace App\Http\Controllers;

use App\Models\contact; // Pastikan 'contact' di sini merujuk ke Model Contact 
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // PERBAIKAN: Mengambil satu kontak dan menyimpannya ke variabel $contact (tunggal)
        // Sesuai dengan apa yang diharapkan oleh form edit  di contacts.blade.php
        $contact = contact::first();

        // Meneruskan variabel $contact (tunggal) ke view 'contacts'
        return view('contacts', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kode  untuk membuat resource baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Kode  untuk menyimpan data baru
    }

    /**
     * Display the specified resource.
     */
    public function show(contact $contact)
    {
        // Kode  untuk menampilkan resource tertentu
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contact $contact)
    {
        // Jika form edit  ini dipanggil dari metode 'edit' di route,
        // maka  akan mengembalikan view di sini
        // return view('contacts', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    // PERBAIKAN: Parameter type-hinting harus $contact (tunggal)
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

        // Simpan data inputan ke objek $contact (tunggal) yang di-inject oleh Laravel
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
    // PERBAIKAN: Parameter type-hinting harus $contact (tunggal)
    public function destroy(contact $contact)
    {
        // Kode  untuk menghapus resource
    }
}