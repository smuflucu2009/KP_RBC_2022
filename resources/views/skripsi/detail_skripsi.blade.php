@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Detail {{$joins->judul}}</title>
<div>
    <a href="/skripsi" class="btn btn-secondary">Kembali</a>
    <h1>Judul: {{ $joins->judul }}</h1>
    <h3>Tanggal Masuk: {{ $joins->tahun }}</h3>
    <div>
        <b>Nama Mahasiswa: </b>{{ $joins->name }}
    </div>
    <div>
        <b>NIM: </b>{{ $joins->nim }}
    </div>
    <div>
        <b>Bidang: </b>{{ $joins->nama_bidang}}
    </div>
    <div>
        <b>Dosen Pembimbing I: </b>{{ $joins->namadosen1 }}
    </div>
    <div>
        <b>Dosen Pembimbing II: </b>{{ $joins->namadosen2 }}
    </div>
    <div>
        <b>Abstrak: </b>{{ $joins->abstrak }}
    </div>
    <div>
        @if ($joins->file)
            <a class="btn btn-success btn-sm" href="{{ asset('storage/pdf/skripsi/'. $joins->file)}}">Lihat File</a>
        @endif
    </div>
</div>
@endsection