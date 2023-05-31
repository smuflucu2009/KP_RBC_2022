@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Tugas Akhir Digital</title>
    </head>

    <body>
        <div class="land">
            <div class="bg-2" style="max-height: 50%">
                <div class="row" style="margin-left: 0%">
                    <div class="col-sm-9" style="margin-top: 2%">
                        <form action="/buku" method="get">
                            <div class="input-group w-50">
                                <button type="submit" class="btn btn-light search_btn"> <span class="input-group-text"
                                        id="basic-addon1"style="background: none; border: none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                            class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                            </path>
                                        </svg> </span> </button>
                                <input name="judul" type="text" class="form-control search" placeholder="Judul"
                                    value="{{ isset($_GET['judul']) ? $_GET['judul'] : '' }}">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3">
                        <button class="download" type="submit"
                            href="/"style="float: right; margin-right:5%; margin-top:2%">Mobile App <br> Download <br>
                            Here</button>
                    </div>
                    <p>
                        <a class="btn" data-bs-toggle="collapse" href="#collapseExample" role="button"
                            aria-expanded="false" aria-controls="collapseExample" style="width: 100%; color:white">
                            Advanced search <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                            </svg>
                        </a>
                    </p>
                </div>
                <div class="collapse" id="collapseExample" style="background: #3845A7 !important; border: none">
                    <div class="card card-body">
                        <div class="my-3 p-3 bg-body rounded shadow-sm">
                            {{-- <div>
                                <a href="/skripsi/update_admin" class="btn btn-info">Update</a>
                            </div> --}}
                            <form action="/ta" method="get">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Nama Mahasiswa</label>
                                        <input name="name" type="text" class="form-control search" placeholder="Nama"
                                            value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">NIM Mahasiswa</label>
                                        <input name="nim" type="number" class="form-control search" placeholder="NIM"
                                            value="{{ isset($_GET['nim']) ? $_GET['nim'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Judul TA</label>
                                        <input name="judul" type="text" class="form-control search" placeholder="Judul"
                                            value="{{ isset($_GET['judul']) ? $_GET['judul'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Tahun</label>
                                        <input name="tahun" type="number" class="form-control search" placeholder="Tahun"
                                            value="{{ isset($_GET['tahun']) ? $_GET['tahun'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Jenis Bidang</label>
                                        <select name="nama_bidang" class="form-select sortir">
                                            <option value="">-</option>
                                            <option value="RPL">RPL</option>
                                            <option value="Multimedia">Multimedia</option>
                                            <option value="Jaringan">Jaringan</option>
                                            <option value="Embedded">Embedded</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Pembimbing Dosen I</label>
                                        <select name="namadosen1" class="form-select sortir">
                                            <option value="">-</option>
                                            <option value="Dania Eridani S.T., M.Eng">Dania Eridani S.T., M.Eng</option>
                                            <option value="Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE">Dr. Adian Fatchur
                                                Rochim, S.T., M.T. SMIEEE</option>
                                            <option value="Eko Didik Widianto S.T., M.T.">Eko Didik Widianto S.T., M.T.
                                            </option>
                                            <option value="Rinta Kridalukmana, M.Kom., MT., PhD">Rinta Kridalukmana,
                                                M.Kom., MT., PhD</option>
                                            <option value="Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM">Dr. Ir. R. Rizal
                                                Isnanto S.T., M.M., M.T., IPM</option>
                                            <option value="Kurniawan Teguh Martono S.T., M.T.">Kurniawan Teguh Martono
                                                S.T., M.T.</option>
                                            <option value="Risma Septiana S.T., M.Eng.">Risma Septiana S.T., M.Eng.
                                            </option>
                                            <option value="Ike Pertiwi Windasari S.T., M.T.">Ike Pertiwi Windasari S.T.,
                                                M.T.</option>
                                            <option value="Adnan Fauzi S.T., M.Kom.">Adnan Fauzi S.T., M.Kom.</option>
                                            <option value="Dr. Oky Dwi Nurhayati S.T., M.T.">Dr. Oky Dwi Nurhayati S.T.,
                                                M.T.</option>
                                            <option value="Agung Budi Prasetijo S.T., M.I.T., Ph.D.">Agung Budi Prasetijo
                                                S.T., M.I.T., Ph.D.</option>
                                            <option value="Patricia Evericho Mountaines, S.T., M.Cs.">Patricia Evericho
                                                Mountaines, S.T., M.Cs.</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Pembimbing Dosen II</label>
                                        <select name="namadosen2" class="form-select sortir">
                                            <option value="">-</option>
                                            <option value="Dania Eridani S.T., M.Eng">Dania Eridani S.T., M.Eng</option>
                                            <option value="Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE">Dr. Adian Fatchur
                                                Rochim, S.T., M.T. SMIEEE</option>
                                            <option value="Eko Didik Widianto S.T., M.T.">Eko Didik Widianto S.T., M.T.
                                            </option>
                                            <option value="Rinta Kridalukmana, M.Kom., MT., PhD">Rinta Kridalukmana,
                                                M.Kom., MT., PhD</option>
                                            <option value="Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM">Dr. Ir. R. Rizal
                                                Isnanto S.T., M.M., M.T., IPM</option>
                                            <option value="Kurniawan Teguh Martono S.T., M.T.">Kurniawan Teguh Martono
                                                S.T., M.T.</option>
                                            <option value="Risma Septiana S.T., M.Eng.">Risma Septiana S.T., M.Eng.
                                            </option>
                                            <option value="Ike Pertiwi Windasari S.T., M.T.">Ike Pertiwi Windasari S.T.,
                                                M.T.</option>
                                            <option value="Adnan Fauzi S.T., M.Kom.">Adnan Fauzi S.T., M.Kom.</option>
                                            <option value="Dr. Oky Dwi Nurhayati S.T., M.T.">Dr. Oky Dwi Nurhayati S.T.,
                                                M.T.</option>
                                            <option value="Agung Budi Prasetijo S.T., M.I.T., Ph.D.">Agung Budi Prasetijo
                                                S.T., M.I.T., Ph.D.</option>
                                            <option value="Patricia Evericho Mountaines, S.T., M.Cs.">Patricia Evericho
                                                Mountaines, S.T., M.Cs.</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                    <a> <br> </a>
                                    <button type="submit" class="btn btn-light search_btn"> <span class="input-group-text"
                                        id="basic-addon1"style="background: none; border: none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                            class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                            </path>
                                        </svg> </span> </button>
                                    </div>
                                    <div class="col-sm-1">
                                        <a> <br> </a>
                                        <a href='/ta' class="btn btn-danger">
                                            <span class="input-group-text" id="basic-addon1"style="background: none; border: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                            <path d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                          </svg> </span> </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div id="land_header">
            <h1 class="index_header">Tugas Akhir Digital</h1>
        </div>
        <table class="table table-hover table_box">
            <thead class="head_table">
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Nama</th>
                    <th class="col-md-1">NIM</th>
                    <th class="col-md-1">Bidang</th>
                    <th class="col-md-1">Tahun</th>
                    <th class="col-md-3">Judul</th>
                    <th class="col-md-2">Dosen Pembimbing I</th>
                    <th class="col-md-2">Dosen Pembimbing II</th>
                </tr>
            </thead>
            <tbody class="content_table">
                @php $no = 1; @endphp
                @foreach ($joins as $join)
                    <tr class="link_detail" data-href="{{ url('/skripsi/detail/' . $join->id_skripsi) }}">
                        <td>{{ $no++ }}</td>
                        <td>{{ $join->name }}</td>
                        <td>{{ $join->nim }}</td>
                        <td>{{ $join->nama_bidang }}</td>
                        <td>{{ $join->tahun }}</td>
                        <td>{{ $join->judul }}</td>
                        <td>{{ $join->namadosen1 }}</td>
                        <td>{{ $join->namadosen2 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $joins->withQueryString()->links() }}
        </div>
        <script>
            jQuery(document).ready(function($) {
                $(".link_detail").click(function() {
                    window.location = $(this).data("href");
                });
            });
            </script>
    </body>
@endsection
