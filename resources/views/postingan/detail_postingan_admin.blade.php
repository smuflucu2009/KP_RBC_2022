@extends('boostrap/dasar')
@section('isi_template')
<title>{{$joins->judul}}</title>

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
        <div style="margin-left: 5%">
            <h1>{{ $joins->judul }}</h1>

        </div>
        <br>
        <hr>
        <div class="deskripsi">
        <h3> <b> ABSTRAK </b></h3>
        <p>{{ $joins->abstrak }}</p>
        </div>

    </div>
</div>
<div>
    <div>
        @if ($joins->cover_gambar)
        <img style="max-width:350px;max-height:350px" src="{{ url('storage/postingan/cover_gambar').'/' . $joins->cover_gambar}}"/>
        @endif
    </div>
    <h1>{{ $joins->judul }}</h1>
    <h4>Waktu Posting: {{ $joins->waktu_posting }}</h4>
    <div>
        <b>Jenis : </b>{{ $joins->name_category }}
    </div>
    <div>
        <b>Deskripsi: </b>{{ $joins->deskripsi }}
    </div>
</div>
@endsection
