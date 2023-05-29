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
                        <h1 style="text-align: end"> Sumbangan Buku </h1>
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
                    <form>
                        <fieldset disabled>
                            <div class="row g-10 align-items-center">
                                <div class="col-sm-2">
                                    <label for="name" class="form-label">Nama Mahasiswa 1</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="nama_mahasiswa_2t" class="form-control form"
                                        placeholder="Didi Suhardi">
                                </div>
                            </div>
                        </fieldset>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="name_2" class="form-label">Nama Mahasiswa 2</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama_mahasiswa_2" class="form-control form"
                                    placeholder="Nama Mahasiswa 3">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama_mahasiswa_3" class="form-label">Nama Mahasiswa 3</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama_mahasiswa_3" class="form-control form"
                                    placeholder="Nama Mahasiswa 3">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama_mahasiswa_4" class="form-label">Nama Mahasiswa 4</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama_mahasiswa_4" class="form-control form"
                                    placeholder="Nama Mahasiswa 4">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama_mahasiswa_5" class="form-label">Nama Mahasiswa 5</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama_mahasiswa_5" class="form-control form"
                                    placeholder="Nama Mahasiswa 5">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama_mahasiswa_6" class="form-label">Nama Mahasiswa 6</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama_mahasiswa_6" class="form-control form"
                                    placeholder="Nama Mahasiswa 6">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="nama_mahasiswa_7" class="form-label">Nama Mahasiswa 7</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama_mahasiswa_7" class="form-control form"
                                    placeholder="Nama Mahasiswa 7">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="angkatan_wisuda" class="form-label">Angkatan Wisuda</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="angkatan_wisuda" class="form-control form"
                                    placeholder="Bulan Tahun (contoh: Januari 2023)">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="judul_buku" class="form-label">Judul Buku</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="judul_buku" class="form-control form"
                                    placeholder="contoh: Dasar Sistem Kontrol">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="tahun_buku" class="form-label">Tahun Terbit</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="tahun_buku" class="form-control form"
                                    placeholder="contoh: 2013">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="pengarang_buku" class="form-label">Nama Pengarang</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="pengarang_buku" class="form-control form"
                                    placeholder=" Contoh : Sumardi, Agung Warsito">
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-sm-2">
                                <label for="harga_buku" class="form-label">Harga Buku</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="harga_buku" class="form-control form"
                                    placeholder="contoh: 100000">
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
