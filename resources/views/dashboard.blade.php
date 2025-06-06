@extends('layouts.app')
@section('title')
    Dashboard
@endsection


@section('content')
 <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <h1 class="h3 mb-0 text-gray-800">Selamat Datang di Dashboard!</h1>
                <p class="text-muted">Ringkasan cepat tentang status website Anda.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info text-white">
                    <div class="inner">
                        <h3>{{ $totalsliders ?? 0 }}</h3> {{-- Menggunakan variabel dari controller --}}
                        <p>Total Sliders</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-images"></i>
                    </div>
                    <a href="{{ route('sliders.index') }}" class="small-box-footer text-white">
                        Lihat Sliders <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success text-white">
                    <div class="inner">
                        <h3>{{ $totalgaleris ?? 0 }}</h3> {{-- Menggunakan variabel dari controller --}}
                        <p>Total Galeri</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-photo-video"></i>
                    </div>
                    <a href="{{ route('galeris.index') }}" class="small-box-footer text-white">
                        Lihat Galeri <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning text-dark">
                    <div class="inner">
                        <h3>{{ $totalcontacts ?? 0 }}</h3> {{-- Menggunakan variabel dari controller --}}
                        <p>Total Kontak</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-address-book"></i>
                    </div>
                    <a href="{{ route('contacts.index') }}" class="small-box-footer text-dark">
                        Lihat Kontak <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger text-white">
                    <div class="inner">
                        <h3>{{ $totalabouts ?? 0 }}</h3> {{-- Menggunakan variabel dari controller --}}
                        <p>Total Tentang Kami</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <a href="{{ route('abouts.index') }}" class="small-box-footer text-white">
                        Kelola Tentang Kami <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        </div>

@endsection

@section('title2')
    test
@endsection

@section('content2')


@endsection