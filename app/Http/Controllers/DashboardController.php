<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Galeri;
use App\Models\Contact;
use App\Models\About;
use App\Models\Artikel;
use Illuminate\Support\Collection;


class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            $totalsliders = Slider::count();
            $totalgaleris = Galeri::count();
            $totalcontacts = Contact::count();
            $totalabouts = About::count();
            $totalartikels = Artikel::count();


            // Mengambil aktivitas terbaru dari model yang dibutuhkan
            $recentArticles = Artikel::orderBy('created_at', 'desc')->limit(5)->get()->map(function ($item) {
                $item->type = 'Artikel';
                $item->url = route('artikel.edit', $item->id); // Link ke halaman edit artikel
                return $item;
            });

            $recentGalleries = Galeri::orderBy('created_at', 'desc')->limit(5)->get()->map(function ($item) {
                $item->type = 'Galeri';
                $item->url = route('galeris.edit', $item->id); // Link ke halaman edit galeri
                return $item;
            });

            $recentSliders = Slider::orderBy('created_at', 'desc')->limit(5)->get()->map(function ($item) {
                $item->type = 'Slider';
                $item->url = route('sliders.edit', $item->id); // Link ke halaman edit slider
                return $item;
            });

            // Menggabungkan semua aktivitas yang dibutuhkan dan mengurutkannya berdasarkan tanggal terbaru
            $recentActivities = collect() // Penting: Inisialisasi koleksi kosong dengan `collect()`
                                ->merge($recentArticles)
                                ->merge($recentGalleries)
                                ->merge($recentSliders)
                                ->sortByDesc('created_at')
                                ->take(10); // Ambil 10 aktivitas terbaru secara keseluruhan


            return view('dashboard', compact(
                'totalsliders',
                'totalgaleris',
                'totalcontacts',
                'totalabouts',
                'totalartikels',
                'recentActivities'    // Ini yang terpenting!
            ));
    }
    return redirect('/login');
    }
}
