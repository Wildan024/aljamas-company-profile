@extends('layouts.app')

@section('title')
    Ubah Data
@endsection

@section('content')
    
    <div class="container">
        <a href="/galeris" class="btn btn-outline-success mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <form action="{{ route('galeris.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                @csrf
                    <div class="mb-3 form-group">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="title" placeholder="Judul" value="{{ old('title', $galeri->title) }}">
                    </div>
                    <div class="mb-3 form-group">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" placeholder="Deskripsi" style="height: 150px">{{ old('description', $galeri->description) }}
                        </textarea>                
                    </div>
                    <div class="mb-3 form-group">
                        <img src="{{ asset('image/' . $galeri->image) }}" alt="" class="img-fluid mb-2" width="200"><br>
                        <label class="form-label">Gambar</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>







@endsection