<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Galeri;
use App\Models\Contact;
use App\Models\About;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
    $totalsliders = Slider::count();
    $totalgaleris = Galeri::count();
    $totalcontacts = Contact::count();
    $totalabouts = About::count();

    return view('dashboard', compact(
        'totalsliders',
        'totalgaleris',
        'totalcontacts',
        'totalabouts'
    ));

    }
    return redirect('/login');
    }
}
