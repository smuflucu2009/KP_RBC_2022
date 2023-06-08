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
                        <h1 style="text-align: end"> Form Feedback RBC </h1>
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
                    <form action='{{ route('feedback.store') }}' method='post'>
                        @csrf
                        @if (Auth::check())
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="name" class="form-label">Nama Pengirim</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="disabledTextInput" class="form-control form" placeholder="{{ auth()->user()->nama }}" name='nama' value="{{ auth()->user()->nama }}" id="nama">
                            </div>
                        </div>
                        @else
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="name" class="form-label">Nama Pengirim</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="disabledTextInput" class="form-control form" name='nama' value="{{ Session::get('nama')}}" id="nama">
                            </div>
                        </div>
                        @endif
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="kontak" class="form-label">Kontak Pengirim</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="number" id="disabledTextInput" class="form-control form" placeholder="+62....." id="kontak" name='kontak' value="{{ Session::get('kontak')}}">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <label for="jenis_feedback" class="form-label ">Apa Jenis Feedback yang ingin anda
                                berikan?</label>
                            <select id="Select" class="form-select form" id="jenis_feedback" name='jenis_feedback' value="{{ Session::get('jenis_feedback')}}">
                                <option>Kritik</option>
                                <option>Laporan</option>
                                <option>Saran</option>
                                <option>Pujian</option>
                            </select>
                        </div>
                        <div class="col-sm-9">
                            <label for="penjelasan" class="form-label">Apa yang ingin anda jelaskan</label>
                            <input type="text" class="form-control form" id="penjelasan" name='penjelasan' value="{{ Session::get('penjelasan')}}">
                        </div>
                        <label for="penjelasan_rinci" class="form-label">Coba ceritakan secara rinci</label>
                        <div class="row align-items-end">
                            <div class="col-sm-9">
                                <textarea rows="4" cols="93" id="penjelasan_rinci" name='penjelasan_rinci' value="{{ Session::get('penjelasan_rinci')}}" class="form">
                             </textarea>
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