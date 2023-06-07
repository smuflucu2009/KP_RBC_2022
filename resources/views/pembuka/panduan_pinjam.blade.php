@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Ruang Baca Computer Engineering</title>
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
            <div class="faq-page">
                <h3 id="land_header">Panduan Peminjaman Buku</h3>
                <div class="faq-isi">
                    <div class="row">
                        <a><strong>1.</strong> Login menggunakan akun yang sudah dimiliki. Apabila belum memiliki akun, silahkan melakukan registrasi terlebih dahulu.</a>
                        <div class="card">
                            <img src="{{asset('asset/panduan_1.png')}}" class="card-img-top" alt="...">
                          </div>
                    </div>
                    <br>
                    <div class="row">
                        <a><strong>2.</strong> Silahkan buka menu Koleksi > Koleksi Tercetak.
                        </a>
                        <div class="card">
                            <img src="{{asset('asset/panduan_2.png')}}" class="card-img-top" alt="...">
                          </div>
                    </div>
                    <br>
                    <div class="row">
                        <a><strong>3.</strong> Cari Buku yang ingin dipinjam. Gunakan fitur pencarian dan filter seperlunya. Apabila sudah menemukan buku yang ingin dipinjam, Klik baris tabel dari buku yang ingin dipinjam.
                        </a>
                        <div class="card">
                            <img src="{{asset('asset/panduan_3.png')}}" class="card-img-top" alt="...">
                          </div>
                    </div>
                    <br>
                    <div class="row">
                        <a><strong>4.</strong> Pada halaman detail buku, tekan tombol pinjam
                        </a>
                        <div class="card">
                            <img src="{{asset('asset/panduan_4.png')}}" class="card-img-top" alt="...">
                          </div>
                    </div>
                    <br>
                    <div class="row">
                        <a><strong>5.</strong> Pilih lama waktu peminjaman dan tekan submit. Tunggu admin menerima pengajuan peminjaman
                        </a>
                        <div class="card">
                            <img src="{{asset('asset/panduan_5.png')}}" class="card-img-top" alt="...">
                          </div>
                    </div>
                    <br>
                    <div class="row">
                        <a><strong>6.</strong> Selamat, kamu sudah bisa meminjam buku, konfirmasi peminjaman kepada admin jaga ya!
                        </a>
                    </div>
                    <br>
                </div>
            </div>
    </body>
@endsection
