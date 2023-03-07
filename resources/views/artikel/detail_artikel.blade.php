@extends('boostrap/dasar1')
@section('isi_template1')
<title>Halaman Detail {{$data->judul_artikel}}</title>
<div>
    <a href="/artikel" class="btn btn-secondary">Kembali</a>
    <h1>{{ $data->judul_artikel }}</h1>
    <h3>{{ $data->jenis_artikel }}</h3>
    <div>
        {{ $data->waktu_artikel }}
    </div>
    <div>
        {{ $data->isi_artikel }}
    </div>
</div>
@endsection
