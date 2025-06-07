@extends('layouts.app2')

@section('title')
    Tambah Artikel
@endsection

@section('content')
    
    <div class="container">
        <a href="{{ route('artikel.index') }}" class="btn btn-outline-success mb-3">Kembali</a>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                {{-- Form untuk menambahkan artikel baru --}}
                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3 form-group">
                        <label for="title" class="form-label">Judul Artikel</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul Artikel" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="description" class="form-label">Isi Artikel</label>
                        {{-- ID 'description' akan digunakan oleh Summernote --}}
                        <textarea class="form-control" id="description" name="description" placeholder="Tulis Isi Artikel di sini" style="height: 200px" required></textarea>                
                    </div>
                    <div class="mb-3 form-group">
                        <label for="image" class="form-label">Gambar Artikel</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Simpan Artikel</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- CSS Summernote (taruh di bagian head atau sebelum script) --}}
    @push('styles') {{-- Jika Anda menggunakan stack 'styles' di layouts/app.blade.php --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    @endpush

@endsection

@push('scripts') {{-- Jika Anda menggunakan stack 'scripts' di layouts/app.blade.php --}}
    {{-- jQuery (Summernote membutuhkan jQuery) --}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- JavaScript Summernote --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Tulis Isi Artikel di sini...',
                tabsize: 2,
                height: 200, // Tinggi editor
                toolbar: [ // Kustomisasi toolbar
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endpush