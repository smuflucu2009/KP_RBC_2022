@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Detail Sumbangan Buku{{$joins->judul_buku}}</title>
<div>
    <a href="/sumbangan_buku/admin" class="btn btn-secondary">Kembali</a>
    <h1>Judul Buku: {{ $joins->judul_buku }}</h1>
    <h3>Tanggal Masuk: {{ $joins->waktu_sumbang }}</h3>
    <div>
        <b>Nama Mahasiswa 1: </b>{{ $joins->nama }}
    </div>
    <div>
        <b>Nama Mahasiswa 2: </b>{{ $joins->nama2 }}
    </div>
    <div>
        <b>Nama Mahasiswa 3: </b>{{ $joins->nama3 }}
    </div>
    <div>
        <b>Nama Mahasiswa 4: </b>{{ $joins->nama4 }}
    </div>
    <div>
        <b>Nama Mahasiswa 5: </b>{{ $joins->nama5 }}
    </div>
    <div>
        <b>Nama Mahasiswa 6: </b>{{ $joins->nama6 }}
    </div>
    <div>
        <b>Nama Mahasiswa 7: </b>{{ $joins->nama7 }}
    </div>
    <div>
        <b>Tahun Terbit: </b>{{ $joins->tahun_terbit }}
    </div>
    <div>
        <b>Penulis: </b>{{ $joins->penulis }}
    </div>
    <div>
        <b>Harga Buku: </b>{{ $joins->harga }}
    </div>
@endsection