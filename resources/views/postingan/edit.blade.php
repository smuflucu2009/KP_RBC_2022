@extends('boostrap/dasar')
@section('isi_template')
<head>
    <link rel="stylesheet" type="/css/text/css" href="trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
<title>Halaman Edit Postingan</title>
<div>
    <a href="/postingan/update_admin" class="btn btn-secondary">Kembali</a>
    <h1>Ini halaman untuk edit postingan</h1>
</div>
<form action='{{ route('postingan.update', $joins->id_posting) }}' method='post' enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul Postingan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' value="{{ $joins->judul }}" id="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="category_id" class="col-sm-2 col-form-label">Jenis Postingan</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='category_id' value="{{ $joins->category_id }}" id="category_id">
                    <option selected>.</option>
                    <option value="1">Info Magang</option>
                    <option value="2">Info Lomba</option>
                    <option value="3">Research News</option>
                    <option value="4">Meditekkom</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Isi Artikel</label>
            <input id="deskripsi" type="hidden" name="deskripsi">
            <trix-editor input="deskripsi" value="{{ $joins->deskripsi }}" id="deskripsi"></trix-editor>
        </div> 
        @if ($joins->cover_gambar)
        
        <img style="max-width:350px;max-height:350px" src="{{ url('storage/postingan/cover_gambar').'/' . $joins->cover_gambar}}"/>
        
        @endif
        <div class="mb-3 row">
            <label for="cover_gambar" class="col-sm-2 col-form-label">Cover Gambar</label>
            <div class="col-md-8">
                <input type="file" class="form-control" name="cover_gambar" id="cover_gambar">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
        </div> 
    </div>
</form>

<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
@endsection
