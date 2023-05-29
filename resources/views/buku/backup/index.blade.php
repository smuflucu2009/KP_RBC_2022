@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Halaman Buku</title>
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
                                <input name="judul_buku" type="text" class="form-control search" placeholder="Judul"
                                    value="{{ isset($_GET['judul_buku']) ? $_GET['judul_buku'] : '' }}">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-3">
                        <button class="download" type="submit"
                            href="/"style="float: right; margin-right:5%; margin-top:2%">Mobile App <br> Download <br>
                            Here</button>
                    </div>
                    <p>
                        <a class="btn" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample" style="width: 100%; color:white">
                            Advanced search <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
                              </svg>
                        </a>
                    </p>
                </div>
                <div class="collapse" id="collapseExample" style="background: #3845A7 !important; border: none">
                    <div class="card card-body" >
                        <div class="my-3 p-3 bg-body rounded shadow-sm" >
                            <div class="pb-3">
                                <a href='/buku/update_admin' class="btn btn-primary">Update Buku</a>
                            </div>
                            <form action="/buku" method="get">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Kode Buku</label>
                                        <input name="kode_gabungan_final" type="text" class="form-control search"
                                            placeholder="Kode"
                                            value="{{ isset($_GET['kode_gabungan_final']) ? $_GET['kode_gabungan_final'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Judul Buku</label>
                                        <input name="judul_buku" type="text" class="form-control search" placeholder="Judul"
                                            value="{{ isset($_GET['judul_buku']) ? $_GET['judul_buku'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Penulis</label>
                                        <input name="penulis" type="text" class="form-control search" placeholder="Penulis"
                                            value="{{ isset($_GET['penulis']) ? $_GET['penulis'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Penerbit</label>
                                        <input name="penerbit" type="text" class="form-control search" placeholder="Penerbit"
                                            value="{{ isset($_GET['penerbit']) ? $_GET['penerbit'] : '' }}">
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="form-label">Jenis Peminatan</label>
                                        <select name="jenis_peminatan" class="form-select sortir">
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
                                        <select name="detail_jenis_peminatan" class="form-select sortir">
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
                                                Organizations
                                            </option>
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
                                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                                    </div>
                                </div>
                            </form>
                            <div class="pb-3 ">
                                <a href='/buku' class="btn btn-danger">Reset Cari</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                <div id="land_header">
                    <h1 class="index_header">Koleksi Tercetak Digital</h1>
                </div>
                <table class="table table-hover table_box">
                    <thead class="head_table">
                        <tr>
                            <th class="col-md-1">Kode Buku</th>
                            <th class="col-md-1">Judul Buku</th>
                            <th class="col-md-1">Penulis</th>
                            <th class="col-md-1">Penerbit</th>
                            <th class="col-md-1">Jenis Peminatan</th>
                            <th class="col-md-1">Detail Jenis Peminatan</th>
                            <th class="col-md-1">Status Pinjam</th>
                            <th class="col-md-1">Detail Buku</th>
                        </tr>
                    </thead>
                    <tbody class="content_table">
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->kode_gabungan_final }}</td>
                                <td>{{ $item->judul_buku }}</td>
                                <td>{{ $item->penulis }}</td>
                                <td>{{ $item->penerbit }}</td>
                                <td>{{ $item->jenis_peminatan }}</td>
                                <td>{{ $item->detail_jenis_peminatan }}</td>
                                <td>{{ $item->status_pinjam }}</td>
                                <td>
                                    <a href='{{ url('/buku/detail/' . $item->kode_gabungan_final) }}'
                                        class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->withQueryString()->links() }}
            </div>
    </body>
@endsection
