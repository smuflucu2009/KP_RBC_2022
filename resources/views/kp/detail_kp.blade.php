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
                @if ($joins->file)
                <td> <a type="submit" class="btn btn-primary form_submit" href="{{ asset('storage/pdf/kp/'. $joins->file)}}">Full PDF</a> </td> 
                @endif
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
@endsection