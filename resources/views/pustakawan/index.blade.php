@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Ruang Baca Teknik Komputer</title>
    </head>

    <body>
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
            <h3 id="pustakawan_header">Pustakawan</h3>
        </div>

        <div class="bg-profil">
        
            <div class="row">
                <div class="col-sm-6">
                    <div class="pustakawan_reverse">
                        <div class="card">
                            <div class="image_pustakawan">
                                <img src=" " style="display: block; margin: 0 auto;">
                            </div>
                            <div class="pustakawan_text">
                                <p>Nama</p>
                                <p>NIM</p>
                                <p>Jurusan - Angkatan</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="pustakawan">
                        <div class="card" style="transform: none">
                            <div class="pustakawan_text">
                                <p>Nama</p>
                                <p>NIM</p>
                                <p>Jurusan - Angkatan</p>
                            </div>
                            <div class="image_pustakawan">
                                <img src="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
