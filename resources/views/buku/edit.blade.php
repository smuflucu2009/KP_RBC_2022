@extends('boostrap/dasar1')
@section('isi_template1')
<title>Halaman Edit {{$data->judul_buku}}</title>
<div>
    <a href="/buku/update_admin" class="btn btn-secondary">Kembali</a>
    <h1>Ini Halaman Buat Edit Buku {{$data->judul_buku}}</h1>
</div>
@endsection
