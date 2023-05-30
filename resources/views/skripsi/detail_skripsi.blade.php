@extends('boostrap/dasar')
@section('isi_template')
<title>Detail TA: {{$joins->judul}}</title>
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
                <td> Laporan Tugas Akhir </td>
                <td rowspan="2">
                    <h3>{{ $joins->judul }}</h3>
                </td>
            </tr>
            <br>
            <tr>
                <th> Bidang</th>
            </tr>
            <tr>
                <td> {{ $joins->nama_bidang}}</td>
                
            </tr>
            <tr>
                <th></th>
                <td rowspan="2">{{ $joins->name }}, {{ $joins->namadosen1 }}, {{ $joins->namadosen2 }}</td>
                <th>  &emsp; </th>
                <td> <button type="submit" class="btn btn-primary form_submit" href="{{ asset('storage/pdf/skripsi/'. $joins->file)}}">Full PDF</button> </td> 
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