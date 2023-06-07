@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>KP - Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>

        <div class="land">
            <div class="bg-2" style="max-height: 50%">
                <div class="row" style="margin-left: 0%">
                    <div class="col-sm-9" style="margin-top: 2%">
                        <a href="/kp/update_admin/create" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus"
                                viewBox="0 0 16 16">
                                <path
                                    d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                            </svg> tambah</a>
                        <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-upload" viewBox="0 0 16 16">
                                <path
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z" />
                            </svg> <a> upload data </a>
                        </button>
                        <form onsubmit="return confirm('Yakin ingin menghapus semua buku ?')" class="d-inline"
                            action="{{ route('buku.delete_all') }}" method="POST">
                            @csrf
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus semua <br>
                                data</button>
                        </form>
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
                            <form action="/kp/update_admin" method="get">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-2">
                                        <label for="" class="form-label">Nama Mahasiswa</label>
                                        <input name="name" type="text" class="form-control search" placeholder="Nama" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="" class="form-label">NIM Mahasiswa</label>
                                        <input name="nim" type="text" class="form-control search" placeholder="NIM" value="{{isset($_GET['nim']) ? $_GET['nim'] : ''}}">  
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="" class="form-label">Judul KP</label>
                                        <input name="judul" type="text" class="form-control search" placeholder="Judul KP" value="{{isset($_GET['judul']) ? $_GET['judul'] : ''}}">  
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="" class="form-label">Tahun</label>
                                        <input name="tahun" type="number" class="form-control search" placeholder="Tahun" value="{{isset($_GET['tahun']) ? $_GET['tahun'] : ''}}">  
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="" class="form-label">Nama Perusahaan</label>
                                        <input name="perusahaan" type="text" class="form-control search" placeholder="Perusahaan" value="{{isset($_GET['perusahaan']) ? $_GET['perusahaan'] : ''}}">  
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="" class="form-label">Lokasi Perusahaan</label>
                                        <input name="lokasi_perusahaan" type="text" class="form-control search" placeholder="Lokasi Perusahaan" value="{{isset($_GET['lokasi_perusahaan']) ? $_GET['lokasi_perusahaan'] : ''}}">  
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
                                        <label for="" class="form-label">Dosen Pembimbing</label>
                                        <select name="nama_dosen" class="form-select sortir">
                                            <option value="">-</option>
                                            <option value="Dania Eridani S.T., M.Eng">Dania Eridani S.T., M.Eng</option>
                                            <option value="Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE">Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE</option>
                                            <option value="Eko Didik Widianto S.T., M.T.">Eko Didik Widianto S.T., M.T.</option>
                                            <option value="Rinta Kridalukmana, M.Kom., MT., PhD">Rinta Kridalukmana, M.Kom., MT., PhD</option>
                                            <option value="Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM">Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM</option>
                                            <option value="Kurniawan Teguh Martono S.T., M.T.">Kurniawan Teguh Martono S.T., M.T.</option>
                                            <option value="Risma Septiana S.T., M.Eng.">Risma Septiana S.T., M.Eng.</option>
                                            <option value="Ike Pertiwi Windasari S.T., M.T.">Ike Pertiwi Windasari S.T., M.T.</option>
                                            <option value="Adnan Fauzi S.T., M.Kom.">Adnan Fauzi S.T., M.Kom.</option>
                                            <option value="Dr. Oky Dwi Nurhayati S.T., M.T.">Dr. Oky Dwi Nurhayati S.T., M.T.</option>
                                            <option value="Agung Budi Prasetijo S.T., M.I.T., Ph.D.">Agung Budi Prasetijo S.T., M.I.T., Ph.D.</option>
                                            <option value="Patricia Evericho Mountaines, S.T., M.Cs.">Patricia Evericho Mountaines, S.T., M.Cs.</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <a> <br> </a>
                                        <button type="submit" class="btn btn-primary search_btn"> <span class="input-group-text"
                                            id="basic-addon1"style="background: none; border: none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                                class="bi bi-search" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                                </path>
                                            </svg> </span> </button>
                                    </div>
                                    <div class="col-sm-2">
                                        <a> <br> </a>
                                        <a href='/kp' class="btn btn-danger">
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
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="/kp/update_admin/import_excel" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                        </div>
                        <div class="modal-body">

                            {{ csrf_field() }}

                            <label>Pilih file excel</label>
                            <div class="form-group">
                                <input type="file" name="file" required="required">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        {{-- notifikasi form validasi --}}
        @if ($errors->has('file'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
        @endif

        {{-- notifikasi sukses --}}
        @if ($sukses = Session::get('sukses'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $sukses }}</strong>
            </div>
        @endif
            <!-- Import Excel -->
<div id="land_header">
            <h1 class="index_header">Halaman Admin: Kerja Praktik</h1>
        </div>
            <div class="overflow-scroll">
                <table class="table table-hover table_box">
                    <thead class="head_table">
                        <tr>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-1">NIM</th>
                            <th class="col-md-1">Bidang</th>
                            <th class="col-md-1">Tahun</th>
                            <th class="col-md-3">Judul</th>
                            <th class="col-md-1">Perusahaan</th>
                            <th class="col-md-2">Pembimbing KP</th>
                            <th >File</th>
                            <th class="col-md-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="content_table">
                        @foreach ($joins as $join)
                            <tr class="link_detail">
                                <td>{{ $join->name }}</td>
                                <td>{{ $join->nim }}</td>
                                <td>{{ $join->nama_bidang }}</td>
                                <td>{{ $join->tahun }}</td>
                                <td>{{ $join->judul }}</td>
                                <td>{{ $join->perusahaan }}</td>
                                <td>{{ $join->nama_dosen }}</td>
                                <td>
                                    @if ($join->file)
                                        <a class="btn btn-success btn-sm"
                                            href="{{ asset('storage/pdf/kp/' . $join->file) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                              </svg></a>
                                    @endif
                                </td>
                                <td>
                                    <a href='{{ url('/kp/update_admin/edit/' . $join->id_kp) }}'
                                        class="btn btn-warning btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-pencil-square"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg></a>
                                    <form onsubmit="return confirm('Yakin ingin menghapus permanen data KP ini?')"
                                        class="d-inline" action="{{ route('kp.delete', $join->id_kp) }}" method="post">
                                        @csrf
                                        <button type="submit" name="submit"
                                            class="btn btn-danger btn-sm"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                        </svg></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $joins->withQueryString()->links() }}
            </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>
    </body>
@endsection
