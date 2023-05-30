@extends('boostrap/dasar')
@section('isi_template')
<title>Detail KP: {{$joins->judul}}</title>
<div class="land">
    <div class="bg-2">
        <div class="row">
            <div class="col-sm-12">
                <button class="download" type="submit"
                    href="/"style="float: right; margin-right:5%; margin-top:2%">Mobile App <br> Download <br>
                    Here</button>
            </div>
        </div>
    </div>
</div>

<div class="panduan">
    <div style="margin-top: 1%">
        <table style="margin-left: 5%">
            <tr>
                <th class="col-md-3"> Tipe Koleksi </th>
                <td class="col-md-6"> <b>Teknik Komputer-Universitas Diponegoro </b> &emsp; &emsp;
                    &emsp;{{ $joins->tahun }}</td>
                <td> </td>
            </tr>
            <tr>
                <td> Laporan Kerja Praktik </td>
                <td rowspan="2">
                    <h3>{{ $joins->judul }}</h3>
                </td>
            </tr>
            <br>
            <tr>
                <th> Perusahaan</th>
            </tr>
            <tr>
                <td> {{ $joins->perusahaan }}</td>
                
            </tr>
            <tr>
                <th>Alamat</th>
                
            </tr>
            <tr>
                <td> {{ $joins->lokasi_perusahaan }}</td>
                <td rowspan="2">{{ $joins->name }}, {{ $joins->nama_dosen }}</td>
                <th>  &emsp; </th>
                <td> <button type="submit" class="btn btn-primary form_submit" href="{{ asset('storage/pdf/kp/'. $joins->file)}}">Full PDF</button> </td> 
            </tr>
        </table>
        <br>
        <hr>
        <div class="deskripsi">
        <h3> <b> ABSTRAK </b></h3>
        <p>{{ $joins->abstrak }}</p>
        </div>

    </div>
</div>

{{-- <div>
    <a href="/kp" class="btn btn-secondary">Kembali</a>
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
        @if ($joins->file)
            <a class="btn btn-success btn-sm" href="{{ asset('storage/pdf/kp/'. $joins->file)}}">Lihat File</a>
        @endif
    </div>
</div> --}}
@endsection