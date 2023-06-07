@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Halaman Update Buku - Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
        <div class="land">
            <div class="bg-2" style="max-height: 50%">
                <div class="row" style="margin-left: 0%">
                    <div class="col-sm-9" style="margin-top: 2%">
                        <a href="/buku/update_admin/create" class="btn btn-primary">Tambah buku</a>
                        <a href="/buku/update_admin/pinjambuku" class="btn btn-warning">Peminjaman Buku</a>
                        <a href="/buku/update_admin/export_excel" class="btn btn-success my-3" target="_blank">EXPORT
                            EXCEL</a>
                        <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                            IMPORT EXCEL
                        </button>
                        <form onsubmit="return confirm('Yakin ingin menghapus semua buku ?')" class="d-inline"
                            action="{{ route('buku.delete_all') }}" method="POST">
                            @csrf
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete All</button>
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
                            {{-- <div class="pb-3">
                            <a href='/buku/update_admin' class="btn btn-primary">Update Buku</a>
                        </div> --}}
                            <form action="/buku/update_admin" method="get">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Kode Buku</label>
                                        <input name="kode_gabungan_final" type="text" class="form-control"
                                            placeholder="Kode"
                                            value="{{ isset($_GET['kode_gabungan_final']) ? $_GET['kode_gabungan_final'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Judul Buku</label>
                                        <input name="judul_buku" type="text" class="form-control" placeholder="Judul"
                                            value="{{ isset($_GET['judul_buku']) ? $_GET['judul_buku'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Penulis</label>
                                        <input name="penulis" type="text" class="form-control" placeholder="Penulis"
                                            value="{{ isset($_GET['penulis']) ? $_GET['penulis'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Penerbit</label>
                                        <input name="penerbit" type="text" class="form-control" placeholder="Penerbit"
                                            value="{{ isset($_GET['penerbit']) ? $_GET['penerbit'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Jenis Peminatan</label>
                                        <select name="jenis_peminatan" class="form-select">
                                            <option value="">-</option>
                                            <option value="Sistem Tertanam & Robotika">Sistem Tertanam & Robotika</option>
                                            <option value="Multimedia">Multimedia</option>
                                            <option value="Jaringan & Keamanan Komputer">Jaringan & Keamanan Komputer
                                            </option>
                                            <option value="Perangkat Lunak & Mobile Computing">Perangkat Lunak & Mobile
                                                Computing</option>
                                            <option value="Diluar Peminatan">Diluar Peminatan</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Detail Jenis Peminatan</label>
                                        <select name="detail_jenis_peminatan" class="form-select">
                                            <option value="">-</option>
                                            <option value="Linux">Linux</option>
                                            <option value="Network Security">Network Security</option>
                                            <option value="Computer Networks">Computer Networks</option>
                                            <option value="Wireless Networks">Wireless Networks</option>
                                            <option value="IT Governance">IT Governance</option>
                                            <option value="Expert System">Expert System</option>
                                            <option value="Embedded System">Embedded System</option>
                                            <option value="Robotics">Robotics</option>
                                            <option value="Fuzzy">Fuzzy</option>
                                            <option value="Computer Architecture & Organizations">Computer Architecture &
                                                Organizations</option>
                                            <option value="Web Development">Web Development</option>
                                            <option value="Mobile Development">Mobile Development</option>
                                            <option value="Programming Language">Programming Language</option>
                                            <option value="Database">Database</option>
                                            <option value="Information System">Information System</option>
                                            <option value="Computer Graphics">Computer Graphics</option>
                                            <option value="Matlab">Matlab</option>
                                            <option value="Data Mining">Data Mining</option>
                                            <option value="Cryptography">Cryptography</option>
                                            <option value="Object-Oriented Programming">Object-Oriented Programming
                                            </option>
                                            <option value="Algorithm & Data Structure">Algorithm & Data Structure</option>
                                            <option value="Human Computer Interaction">Human Computer Interaction</option>
                                            <option value="Data Communications">Data Communications</option>
                                            <option value="Multimedia">Multimedia</option>
                                            <option value="Game Development">Game Development</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <a> <br> </a>
                                        <button type="submit" class="btn btn-primary search_btn"> <span
                                                class="input-group-text"
                                                id="basic-addon1"style="background: none; border: none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="white" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                                    </path>
                                                </svg> </span> </button>
                                    </div>
                                    <div class="col-sm-3">
                                        <a> <br> </a>
                                        <a href='/buku/update_admin' class="btn btn-danger">
                                            <span class="input-group-text"
                                                id="basic-addon1"style="background: none; border: none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="white" class="bi bi-x-octagon" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353L4.54.146zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1H5.1z" />
                                                    <path
                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                </svg> </span> </a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
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
        <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form method="post" action="/buku/update_admin/import_excel" enctype="multipart/form-data">
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

        </div>


        <div id="land_header">
            <h1 class="index_header">Halaman Admin: Buku</h1>
        </div>
        <table class="table table-hover table_box" style="width: 95%">
            <thead class="head_table">
                <tr>
                    <th class="col-md-1">Kode Buku</th>
                    <th class="col-md-2">Judul Buku</th>
                    <th class="col-md-1">Penulis</th>
                    <th class="col-md-1">Penerbit</th>
                    <th class="col-md-2">Jenis Peminatan</th>
                    <th class="col-md-2">Detail Jenis Peminatan</th>
                    <th class="col-md-1">Status Pinjam</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody class="content_table">
                @foreach ($data as $item)
                    <tr class="link_detail">
                        <td>{{ $item->kode_gabungan_final }}</td>
                        <td>{{ $item->judul_buku }}</td>
                        <td>{{ $item->penulis }}</td>
                        <td>{{ $item->penerbit }}</td>
                        <td>{{ $item->jenis_peminatan }}</td>
                        <td>{{ $item->detail_jenis_peminatan }}</td>
                        @if ($item->status_pinjam === 'Tersedia')
                            <td style="background-color: #44F676; ">{{ $item->status_pinjam }}</td>
                        @elseif ($item->status_pinjam === 'Menunggu')
                            <td style="background-color: #F2F644">{{ $item->status_pinjam }}</td>
                        @elseif ($item->status_pinjam === 'Terpinjam')
                            <td style="background-color: #FF0404;">{{ $item->status_pinjam }}</td>
                        @endif
                        <td>
                            <a href='{{ url('/buku/update_admin/edit/' . $item->kode_gabungan_final) }}'
                                class="btn btn-warning btn-sm">Edit</a>
                            <form
                                onsubmit="return confirm('Yakin ingin menghapus buku {{ $item->judul_buku }} dengan kode {{ $item->kode_gabungan_final }}?')"
                                class="d-inline" action="{{ route('buku.delete', $item->kode_gabungan_final) }}"
                                method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
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
