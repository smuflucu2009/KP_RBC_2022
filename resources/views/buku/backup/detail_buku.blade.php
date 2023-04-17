@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Detail {{$data->judul_buku}}</title>
<div>
    <a href="/buku" class="btn btn-secondary">Kembali</a>
    <h1>Judul: {{ $data->judul_buku }}</h1>
    <h3>Tanggal Masuk: {{ $data->tanggal_masuk }}</h3>
    <div>
        <b>Kode Buku: </b>{{ $data->kode_gabungan_final }}
    </div>
    <div>
        <b>Penulis: </b>{{ $data->penulis }}
    </div>
    <div>
        <b>Penerbit: </b>{{ $data->penerbit }}
    </div>
    <div>
        <b>ISBN: </b>{{ $data->isbn }}
    </div>
    <div>
        <b>Jenis Peminatan: </b>{{ $data->jenis_peminatan }}
    </div>
    <div>
        <b>Detail Jenis Peminatan: </b>{{ $data->detail_jenis_peminatan }}
    </div>
    <div>
        <b>Kode Peminatan: </b>{{ $data->kode_peminatan }}
    </div>
    <div>
        <b>Kode Detail Jenis Peminatan: </b>{{ $data->kode_detail_jenis_peminatan }}
    </div>
    <div>
        <b>Kode Tahun: </b>{{ $data->kode_tahun }}
    </div>
    <div>
        <b>Kode Nomor Urut Buku: </b>{{ $data->kode_nomor_urut_buku }}
    </div>
</div>
@endsection