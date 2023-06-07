@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Ruang Baca Teknik Komputer</title>
    </head>

    <body>
        <div class="jumbotron jumbotron-fluid land">
            <div class="bg-3" style="height: 100%">
                <div class="row">
                    <div class="col-sm-2"> </div>
                    <div class="col-sm-6 mobile_text">
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
                        <img src="asset/logo_rbc.png" class= "logo_rbc img">
                        <button class="download logo_rbc" type="submit" href="/">Mobile App <br> Download <br> Here</button>
                    </div>
                </div>
                <div class="row overflow-scroll">
                    <div class="col-md-3">
                      <div class="card mobile">
                        <div class="card-body mobile">
                            <img src="{{ asset('asset/mobile_1.png') }}" class="d-block w-100" alt="...">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="card mobile">
                        <div class="card-body mobile">
                            <br><br><br><br><br>
                            <img src="{{ asset('asset/mobile_2.png') }}" class="d-block w-100" alt="...">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card mobile">
                          <div class="card-body mobile">
                              <img src="{{ asset('asset/mobile_3.png') }}" class="d-block w-100" alt="...">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="card mobile">
                          <div class="card-body mobile">
                            <br><br><br><br><br>
                            <img src="{{ asset('asset/mobile_4.png') }}" class="d-block w-100" alt="...">
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
    </body>

@endsection

