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
                    <form>
                        <fieldset disabled>
                            <div class="row g-10 align-items-center">
                                <div class="col-sm-2">
                                    <label for="name" class="form-label">Nama Pengirim</label>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" id="disabledTextInput" class="form-control form"
                                        placeholder="Didi Suhardi">
                                </div>
                            </div>
                        </fieldset>
                        <div class="row g-10 align-items-center">
                            <div class="col-sm-2">
                                <label for="kontak" class="form-label">Kontak Pengirim</label>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" id="disabledTextInput" class="form-control form"
                                    placeholder="+62.....">
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <label for="jenis_feedback" class="form-label ">Apa Jenis Feedback yang ingin anda
                                berikan?</label>
                            <select id="Select" class="form-select form">
                                <option>Kritik</option>
                                <option>Laporan</option>
                                <option>Saran</option>
                                <option>Pujian</option>
                            </select>
                        </div>
                        <div class="col-sm-9">
                            <label for="keterangan" class="form-label">Apa yang ingin anda jelaskan</label>
                            <input type="text" class="form-control form" id="keterangan">
                        </div>
                        <label for="rincian" class="form-label">Coba ceritakan secara rinci</label>
                        <div class="row align-items-end">
                            <div class="col-sm-9">
                                <textarea rows="4" cols="93" id="keterangan" class="form">
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
