@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Detail {{$joins->judul}}</title>
<div>
    <a href="/" class="btn btn-secondary">Kembali</a>
    <div>
        @if ($joins->cover_gambar)
        <img style="max-width:350px;max-height:350px" src="{{ url('storage/postingan/cover_gambar').'/' . $joins->cover_gambar}}"/>
        @endif
    </div>
    <h1>Judul: {{ $joins->judul }}</h1>
    <h4>Waktu Posting: {{ $joins->waktu_posting }}</h4>
    <div>
        <b>Jenis : </b>{{ $joins->name_category }}
    </div>
    <div>
        <b>Deskripsi: </b>{!! str_replace(['{', '}'], '', $joins->deskripsi) !!}
    </div>
</div>
@endsection
