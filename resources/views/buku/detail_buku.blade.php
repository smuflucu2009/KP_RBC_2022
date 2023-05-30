@extends('boostrap/dasar')
@section('isi_template')
<title>Buku: {{ $data->judul_buku }}</title>
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
        <div style="margin-top: 1%">
            <table style="margin-left: 5%">
                <tr>
                    <th class="col-md-3"> Kode Buku </th>
                    <td class="col-md-6"> <b>Teknik Komputer-Universitas Diponegoro </b> &emsp; &emsp;
                        &emsp;{{ $data->tanggal_masuk }}</td>
                    <td> </td>
                </tr>
                <tr>
                    <td> {{ $data->kode_gabungan_final }} </td>
                    <td rowspan="2">
                        <h3>{{ $data->judul_buku }}</h3>
                    </td>
                </tr>
                <br>
                <tr>
                    <th> Publisher</th>
                </tr>
                <tr>
                    <td> {{ $data->penerbit }}</td>
                    <td> <b> Oleh </b>{{ $data->penulis }}</td>
                </tr>
                <tr>
                    <th>ISBN</th>
                </tr>
                <tr>
                    <td>{{ $data->isbn }}</td>
                    <th> </th>
                    <th class="pinjam_buku">Status </th>
                </tr>
                <tr>
                    <th>Jenis Peminatan</th>
                    <th> </th>
                    <td class="pinjam_buku">{{ $data->status_pinjam }} </td>
                </tr>
                <tr>
                    <td>{{ $data->jenis_peminatan }}</td>
                    <th> </th>
                    {{-- <th class="pinjam_buku"><label for="jenis_feedback" class="form-label ">Durasi Peminjaman</label> </th>  --}}
                </tr>
                <tr>
                    <th>Detail Jenis Peminatan</th>
                    <th> </th>
                        <td class="pinjam_buku">
                            @if ($data->status_pinjam == 'Terpinjam' || $data->status_pinjam == 'Pending')
                            
                            @else
                            <button type="submit" class="btn btn-primary form_submit" data-bs-toggle="modal" data-bs-target="#pinjam">Pinjam</button> 
                            @endif
                        </td>
                </tr>
                <tr>
                    <td>{{ $data->detail_jenis_peminatan }}</td>
                    <th> </th>
                    </tr>
            </table>
            <br>
            {{-- <div class="row">
                <div class="col-sm-4"> </div>
                <div class=" col-sm-4">
                    <img src="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/art-book-cover-design-template-34323b0f0734dccded21e0e3bebf004c_screen.jpg?ts=1637015198"
                        class="d-block w-100">
                </div>
            </div> --}}
        </div>
    </div>

<div class="modal fade" id="pinjam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header panduan">
                <h1 class="modal-title" id="exampleModalLabel">Form Peminjaman Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body faq-page">
                <div class="forms_page">
                    <form action='{{ route('pinjamb.store') }}' method='post'>
                        @csrf
                        <input type="hidden" name="kode_gabungan_final" value="{{ $data->kode_gabungan_final }}">
                        <fieldset disabled>
                            <div class="row g-12 align-items-center">
                                <div class="col-sm-4">
                                    <label for="name" class="form-label">Nama</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control form" name='name' placeholder="{{ auth()->user()->nama }}" id="name">
                                </div>
                            </div>
                            <div class="row g-12 align-items-center">
                                <div class="col-sm-4">
                                    <label for="NIM" class="form-label">NIM</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control form" name='nim' placeholder="{{ auth()->user()->nim }}" id="nim">
                                </div>
                            </div>
                        </fieldset>
                        <div class="row g-12 align-items-center">
                            <div class="col-sm-4">
                                <label for="durasi_pinjam" class="form-label ">Lama Pinjam</label>
                            </div>
                            <div class="col-sm-8">
                                <label for="tanggal_pengembalian">Waktu Pengembalian:</label>
                                <select name="tanggal_pengembalian" id="tanggal_pengembalian" class="form">
                                    <option value="A">7 hari</option>
                                    <option value="B">14 hari</option>
                                </select>
                            </div>
                        </div>


                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary form_submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection