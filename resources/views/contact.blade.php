@extends('layouts.app')

@section('title')
    update Data Tentang/about
@endsection

@section('content')
    
    <div class="container">
        <a href="/dashboard" class="btn btn-outline-success mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success">
                            <strong>Berhasil</strong>
                            <p>{{$message}}</p>
                        </div>
                    @endif

                <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') {{-- Gunakan method PUT untuk update --}}

                <div class="mb-3 form-group">
                    <label class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $contact->name) }}" required>
                </div>

                <div class="mb-3 form-group">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" style="height: 150px" required>{{ old('description', $contact->description) }}</textarea>
                </div>

                <div class="mb-3 form-group">
                    <label class="form-label">Logo</label>
                    @if ($contact->logo)
                        <div class="mb-2">
                            <img src="{{ asset('uploads/contact/' . $contact->logo) }}" alt="Logo" height="80">
                        </div>
                    @endif
                    <input type="file" class="form-control" name="logo" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah logo</small>
                </div>


                <div class="mb-3 form-group">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{ old('alamat', $contact->alamat) }}" required>
                </div>

                <div class="mb-3 form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $contact->email) }}" required>
                </div>

                <div class="mb-3 form-group">
                    <label class="form-label">Telepon</label>
                    <input type="text" class="form-control" name="telepon" value="{{ old('telepon', $contact->telepon) }}" required>
                </div>

                <div class="mb-3 form-group">
                    <label class="form-label">Google Maps Embed</label>
                    <textarea class="form-control" name="maps_embed" style="height: 100px" required>{{ old('maps_embed', $contact->maps_embed) }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>







@endsection