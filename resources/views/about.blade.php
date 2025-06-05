@extends('layouts.app')

@section('title')
    Tambah Data
@endsection

@section('content')
    
    <div class="container">
        <a href="/sliders" class="btn btn-outline-success mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3 form-group">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title" placeholder="Judul" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" placeholder="Deskripsi" style="height: 150px" required></textarea>                
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>







@endsection