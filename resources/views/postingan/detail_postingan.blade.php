@extends('boostrap/dasar')
@section('isi_template')
<title>Postingan: {{$joins->judul}}</title>
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
        @if ($joins->cover_gambar)
        <div class="card text-center">
                    <img style="max-width:350px;max-height:350px" src="{{ url('storage/postingan/cover_gambar').'/' . $joins->cover_gambar}}"/>
                  </div>
        @endif
    </div>
    <table style="margin-left: 5%">
        <tr>
            <th class="col-md-3"> Tipe Postingan </th>
        </tr>
        <tr>
            <td> {{ $joins->name_category }} </td>
            <td rowspan="2" class="col-md-6"> 
                <h3>{{ $joins->judul }}</h3>
            </td>
        </tr>
        <tr>
            <th class="col-md-3"> Tanggal Post </th>
        </tr>
        <tr>
            <td class="col-md-3"> {{ $joins->waktu_posting }} </td>
        </tr>
    </table>
    <br>
    <hr>
    <div class="deskripsi">
    <h3> <b> DESKRIPSI </b></h3>
    <p>{!! str_replace(['{', '}'], '', $joins->deskripsi) !!}</p>
    </div>
    
</div>
@endsection
