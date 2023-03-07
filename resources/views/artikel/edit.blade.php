@extends('boostrap/dasar1')
<head>
    <link rel="stylesheet" type="/css/text/css" href="trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
@section('isi_template1')
<title>Halaman Buat Artikel</title>
<div>
    <a href="/artikel/update_admin" class="btn btn-secondary">Kembali</a>
    <h1>Ini halaman untuk pembuatan Artikel</h1>
</div>
<form action='{{ route('artikel.update', $data->id_artikel) }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="judul_artikel" class="col-sm-2 col-form-label">Judul Artikel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul_artikel' value="{{ $data->judul_artikel }}" id="judul_artikel">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jenis_artikel" class="col-sm-2 col-form-label">Jenis Artikel</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='jenis_artikel' value="{{ $data->jenis_artikel }}" id="jenis_artikel">
                    <option selected>.</option>
                    <option value="Info Magang">Info Magang</option>
                    <option value="Info Lomba">Info Lomba</option>
                    <option value="Research News">Research News</option>
                    <option value="Meditekkom">Meditekkom</option>
                </select>
            </div>
        </div>
          {{-- Waktu --}}
        <div class="mb-3 row">
            <label for="waktu_artikel" class="col-sm-2 col-form-label">Waktu Artikel</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='waktu_artikel' value="{{ $data->waktu_artikel }}" id="waktu_artikel">
            </div>
        </div>
        {{-- Isi --}}
        <div class="mb-3">
            <label for="isi_artikel" class="form-label">Isi Artikel</label>
            <input id="isi_artikel" type="hidden" name="isi_artikel">
            <trix-editor input="isi_artikel" value="{{ $data->isi_artikel }}" id="isi_artikel"></trix-editor>
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
