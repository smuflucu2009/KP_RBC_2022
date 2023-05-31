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
                        <h1 style="text-align: end"> Form Pengunjung RBC </h1>
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
                    <form action='{{ route('pengunjung.store') }}' method='post'>
                        @csrf
                        @if (Auth::check())
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="name" class="form-label">Nama</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama" class="form-control form" placeholder="{{ auth()->user()->nama }}" name='nama' value="{{ auth()->user()->nama }}" id="nama">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                            <label for="NIM" class="form-label">NIM</label>
                            </div>
                            <div class="col-sm-7">
                            <input type="number" id="nim" placeholder="{{ auth()->user()->nim }}" class="form-control form" name='nim' value="{{ auth()->user()->nim }}" id="nim">
                            </div>
                        </div>
                        @else
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="name" class="form-label">Nama</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="nama" class="form-control form" name='nama' value="{{ Session::get('nama')}}" id="nama">
                            </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                            <label for="NIM" class="form-label">NIM</label>
                            </div>
                            <div class="col-sm-7">
                            <input type="number" id="nim" class="form-control form" name='nim' value="{{ Session::get('nim')}}" id="nim">
                            </div>
                        </div>
                        @endif
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                            <label for="angkatan" class="form-label">Angkatan</label>
                        </div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form" id="angkatan" name='angkatan' value="{{ Session::get('angkatan')}}">
                        </div>
                        </div>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                        <label for="jenis_feedback" class="form-label ">Keperluan hadir</label>
                            </div>
                            <div class="col-sm-7">
                        <select id="Select" class="form-select form" id="keperluan" name='keperluan' value="{{ Session::get('keperluan')}}">
                            <option>Membaca Buku</option>
                            <option>Meminjam Buku</option>
                            <option>Kelas</option>
                            <option>Mengerjakan tugas</option>
                            <option>Lainnya</option>
                        </select>
                            </div>
                        </div>
                        <div class="mb-3 form-check align-items-center">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Saya Hadir sebagai pengunjung Ruang Baca
                                Computer Engineering</label>
                        </div>
                        <div class="row">
                            <div class="col-sm-9">
                                <br>
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary form_submit">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
