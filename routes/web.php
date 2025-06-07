<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/artikels', [HomeController::class, 'artikels']);



// panel login dan logout
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticated']);
// jika di index menggunakan method get maka di routes harus post
Route::get('/logout', [AuthController::class, 'logout']);

// panel dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

// Crud pada slider VIEW ke Dashboard
Route::resource('sliders', SliderController::class)->middleware('auth');

// crud pada galeri VIEW ke Dashboard 
Route::resource('galeris', GaleriController::class)->middleware('auth');


// crud pada tentang/about VIEW ke Dashboard
// Route::get('/about', [AboutController::class, 'index'])->middleware('auth');

// crud pada Contact VIEW ke dashboard
Route::get('/contacts', [ContactController::class, 'index'])->middleware('auth');
Route::post('/contacts', [ContactController::class, 'update'])->middleware('auth');

Route::middleware('auth')->controller(ContactController::class)->group(function () {
    Route::get('/contacts', 'index')->name('contacts.index');
    Route::get('/contacts/create', 'create')->name('contacts.create');
    Route::post('/contacts', 'store')->name('contacts.store');
    Route::put('/contacts/{contact}', 'update')->name('contacts.update');
});


// crud pada tentang kami VIEW ke dashboard
Route::get('/abouts', [AboutController::class, 'index'])->middleware('auth');
// Route::post('/abouts', [AboutController::class, 'update'])->middleware('auth');

Route::middleware('auth')->controller(AboutController::class)->group(function () {
    Route::get('/abouts', 'index')->name('abouts.index');
    Route::get('/abouts/create', 'create')->name('abouts.create');
    Route::get('/abouts/edit', 'edit')->name('abouts.edit');
    Route::post('/abouts', 'store')->name('abouts.store');
    Route::put('/abouts/{about}', 'update')->name('abouts.update');
    Route::delete('/abouts/{about}', 'destroy')->name('abouts.destroy');
});

Route::resource('artikel', ArtikelController::class)->middleware('auth');

