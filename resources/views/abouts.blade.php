@extends('layouts.app')

@section('title')
    Tambah Data Tentang Kami
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="mb-3 form-group">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul Tentang Kami" required>
                </div>
                <div class="mb-3 form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" placeholder="Deskripsi Lengkap Tentang Kami" style="height: 150px" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
