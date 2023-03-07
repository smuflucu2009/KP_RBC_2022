@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Ruang Baca Teknik Komputer</title>
    </head>

    <body>
        <div class="jumbotron jumbotron-fluid land" style="height: 100%">
            <div class="bg-3" style="height: 100%">
                <div class="row">
                    <div class="col-sm-8 mobile_text">
                        <h2> Aplikasi E-Library <br>
                            Ruang Baca Computer Engineering
                        </h2>
                        <br>
                        <a style="color: #FDFDFF;">
                            Aplikasi mobile yang di desain mudah dipahami dan sederhana. <br> <br>
                            Dengan Aplikasi Mobile, Mahasiswa dapat mengakses koleksi digital Ruang Baca Computer Engineering yang dibutuhkan.
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <img src="asset/logo_rbc.png" style="float:right; margin-top:25%; margin-right:20%;">
                    </div>
                </div>
                <div class="mobile_bg">
                    <div class="row">
                        <div class="col-sm-12">
                        <button class="download" type="submit"
                            href="/"style="float: right; margin-right:5%; margin-top:2%">Mobile App <br> Download <br>
                            Here</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

@endsection

