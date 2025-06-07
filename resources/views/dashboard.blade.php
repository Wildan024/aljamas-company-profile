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
            {{-- Tambahan untuk Total Artikel --}}
            <div class="col-lg-3 col-6">
                <div class="small-box bg-primary text-white"> {{-- Anda bisa pilih warna lain, misal 'bg-primary' --}}
                    <div class="inner">
                        <h3>{{ $totalartikels ?? 0 }}</h3> {{-- Variabel baru dari controller --}}
                        <p>Total Artikel</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-newspaper"></i> {{-- Icon untuk artikel, bisa disesuaikan --}}
                    </div>
                    <a href="{{ route('artikel.index') }}" class="small-box-footer text-white">
                        Lihat Artikel <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            {{-- Akhir tambahan untuk Total Artikel --}}
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
    Aktivitas terbaru
@endsection

@section('content2')
<div class="row mt-4">
                <div class="card-body p-0">
                    @if ($recentActivities->isEmpty())
                        <p class="text-center p-3 text-muted">Tidak ada aktivitas terbaru saat ini.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Tipe</th>
                                        <th style="width: 60%">Judul</th>
                                        <th style="width: 30%">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentActivities as $activity)
                                        <tr>
                                            <td>
                                                <span class="badge 
                                                    @if($activity->type == 'Artikel') badge-primary
                                                    @elseif($activity->type == 'Galeri') badge-success
                                                    @elseif($activity->type == 'Slider') badge-info
                                                    @else badge-secondary @endif
                                                mr-1 text-dark"> {{-- Tambahkan text-dark di sini --}}
                                                    @if($activity->type == 'Artikel')
                                                        <i class="fas fa-newspaper"></i>
                                                    @elseif($activity->type == 'Galeri')
                                                        <i class="fas fa-images"></i>
                                                    @elseif($activity->type == 'Slider')
                                                        <i class="fas fa-sliders-h"></i>
                                                    @else
                                                        <i class="fas fa-circle"></i>
                                                    @endif
                                                    {{ $activity->type }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ $activity->url }}" class="text-dark font-weight-bold">
                                                    {{ $activity->title }}
                                                </a>
                                            </td>
                                            <td>
                                                <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
    </div
@endsection