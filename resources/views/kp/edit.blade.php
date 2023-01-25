@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Edit {{$data->judul_buku}}</title>
<div>
    <a href="/buku/update_admin" class="btn btn-secondary">Kembali</a>
    <h1>Ini Halaman Buat Edit Buku {{$data->judul_buku}}</h1>
</div>
<form action='{{ route('buku.update', $data->kode_gabungan_final) }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="no" class="col-sm-2 col-form-label">No</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='no' value="{{ $data->no }}" id="no">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kode_gabungan_final" class="col-sm-2 col-form-label">Kode Buku</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kode_gabungan_final' value="{{ $data->kode_gabungan_final }}" id="kode_gabungan_final">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='tanggal_masuk' value="{{ $data->tanggal_masuk }}" id="tanggal_masuk">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul_buku' value="{{ $data->judul_buku }}" id="judul_buku">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='penulis' value="{{ $data->penulis }}" id="penulis">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='penerbit' value="{{ $data->penerbit }}" id="penerbit">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='isbn' value="{{ $data->isbn }}" id="isbn">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="jenis_peminatan" class="col-sm-2 col-form-label">Jenis Peminatan</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='jenis_peminatan' value="{{ $data->jenis_peminatan }}" id="jenis_peminatan">
                    <option selected>.</option>
                    <option value="Sistem Tertanam & Robotika">Sistem Tertanam & Robotika</option>
                    <option value="Multimedia">Multimedia</option>
                    <option value="Jaringan & Keamanan Komputer">Jaringan & Keamanan Komputer</option>
                    <option value="Perangkat Lunak & Mobile Computing">Perangkat Lunak & Mobile Computing</option>
                    <option value="Diluar Peminatan">Diluar Peminatan</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection
