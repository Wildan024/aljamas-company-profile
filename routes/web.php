<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/artikel', [HomeController::class, 'artikel']);


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
Route::get('/contact', [ContactController::class, 'index'])->middleware('auth');
Route::post('/contact', [ContactController::class, 'update'])->middleware('auth');

Route::middleware('auth')->controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact.index');
    Route::get('/contact/create', 'create')->name('contact.create'); // form tambah
    Route::post('/contact', 'store')->name('contact.store');         // simpan data baru
    Route::put('/contact/{contact}', 'update')->name('contact.update');   // update data existing
});





