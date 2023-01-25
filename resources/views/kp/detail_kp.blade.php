@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Detail {{$joins->judul}}</title>
<div>
    <a href="/kp" class="btn btn-secondary">Kembali</a>
    <h1>Judul: {{ $joins->judul }}</h1>
    <h3>Tanggal Masuk: {{ $joins->tahun }}</h3>
    <div>
        <b>Nama Mahasiswa: </b>{{ $joins->name }}
    </div>
    <div>
        <b>NIM: </b>{{ $joins->NIM }}
    </div>
    <div>
        <b>Bidang: </b>{{ $joins->nama_bidang }}
    </div>
    <div>
        <b>Perusahaan: </b>{{ $joins->perusahaan }}
    </div>
    <div>
        <b>Alamat Perusahaan: </b>{{ $joins->lokasi_perusahaan }}
    </div>
    <div>
        <b>Dosen Pembimbing: </b>{{ $joins->nama_dosen }}
    </div>
    <div>
        <b>Abstrak: </b>{{ $joins->abstrak }}
    </div>
    <div>
        <a href="#" class="btn btn-info">Download</a>
    </div>
</div>
@endsection