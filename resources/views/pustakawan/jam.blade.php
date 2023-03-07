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
            <h3 id="pustakawan_header">Jam layanan</h3>
        </div>

        <div class="bg-profil">
            <div class="d-flex justify-content-center" style=" margin-bottom: 5%">
                <div class="forms" style="color: #FFFFFF; width:45%">
                    <a> SENIN s/d JUMAT <br>
                        JAM 08:00 - 16:00</a>
                    <a> SABTU - MINGGU <br>
                        LIBUR </a>
                </div>
            </div>
            <div id="visi" style="padding: 1% 2% 1% 2%;">
                <div class="jam">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Hari \ Jam</th>
                                <th scope="col">07:00 - 10:00</th>
                                <th scope="col">10:00 - 13:00</th>
                                <th scope="col">13:00 - 16:00</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Senin</th>
                                <td>Tito</td>
                                <td>Bintang</td>
                                <td>Alief</td>
                              </tr>
                              <tr>
                                <th scope="row">Selasa</th>
                                <td>~~~</td>
                                <td>Iyan</td>
                                <td>Imada</td>
                              </tr>
                              <tr>
                                <th scope="row">Rabu</th>
                                <td>Ibnu</td>
                                <td>Hoga</td>
                                <td>Shinta</td>
                              </tr>
                              <tr>
                                <th scope="row">Kamis</th>
                                <td>Asror</td>
                                <td>Jawaar</td>
                                <td>~~~</td>
                              </tr>
                              <tr>
                                <th scope="row">Jumat</th>
                                <td>Fathin</td>
                                <td>Zaqi</td>
                                <td>Shinta</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                    <a>Contact person : 085742704308 (Shinta)</a>
                </div>
            </div>
        </div>

    </body>

@endsection

