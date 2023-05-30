@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Ruang Baca Computer Engineering</title>
    </head>

    <body>
        <div class="land">
            <div class="bg-2">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 style="text-align: end"> Edit Sumbangan Buku </h1>
                    </div>
                    <div class="col-sm-4" style="margin-top: 1%">
                        <button class="download" type="submit"
                            href="/"style="float: right; margin-right:5%; margin-top:2%">Mobile App <br> Download <br>
                            Here</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="panduan">
            <div class="faq-page">
                <div class="forms_page">
                    <form action='{{ route('sumbangan.update', $joins->id) }}' method='post'>
                        @csrf
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama" class="form-label">Nama Mahasiswa 1</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama" class="form-control form" placeholder="Nama Mahasiswa 1" name='nama' value="{{ $joins->nama }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama2" class="form-label">Nama Mahasiswa 2</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama2" class="form-control form"
                                name='nama2' placeholder="Nama Mahasiswa 2" value="{{ $joins->nama2 }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama3" class="form-label">Nama Mahasiswa 3</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama3" class="form-control form"
                                name='nama3' placeholder="Nama Mahasiswa 3" value="{{ $joins->nama3 }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama4" class="form-label">Nama Mahasiswa 4</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama4" class="form-control form"
                                name='nama4' placeholder="Nama Mahasiswa 4" value="{{ $joins->nama4 }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama5" class="form-label">Nama Mahasiswa 5</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama5" class="form-control form"
                                name='nama5' placeholder="Nama Mahasiswa 5" value="{{ $joins->nama5 }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama6" class="form-label">Nama Mahasiswa 6</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama6" class="form-control form"
                                name='nama6' placeholder="Nama Mahasiswa 6" value="{{ $joins->nama6 }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama7" class="form-label">Nama Mahasiswa 7</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama7" class="form-control form"
                                name='nama7' placeholder="Nama Mahasiswa 7" value="{{ $joins->nama7 }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="angkatan_wisuda" class="form-label">Angkatan Wisuda</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="angkatan_wisuda" class="form-control form"
                                    placeholder="Bulan Tahun (contoh: Januari 2023)" name='angkatan_wisuda' value="{{ $joins->angkatan_wisuda }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="judul_buku" class="form-label">Judul Buku</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="judul_buku" class="form-control form"
                                    placeholder="contoh: Dasar Sistem Kontrol" name='judul_buku' value="{{ $joins->judul_buku }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="tahun_terbit" class="form-control form"
                                    placeholder="contoh: 2013" name='tahun_terbit' value="{{ $joins->tahun_terbit }}">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="penulis" class="form-label">Nama Pengarang</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="penulis" class="form-control form"
                                    placeholder=" Contoh : Sumardi, Agung Warsito" name='penulis' value="{{ $joins->penulis }}">
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-sm-2">
                                <label for="harga" class="form-label">Harga Buku</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="harga" class="form-control form"
                                    placeholder="contoh: 100000" name='harga' value="{{ $joins->harga }}">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary form_submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
