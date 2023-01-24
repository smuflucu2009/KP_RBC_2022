@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Buat Buku</title>
<div>
    <a href="/buku/update_admin" class="btn btn-secondary">Kembali</a>
    <h1>Ini Halaman Buat Data Buku Baru</h1>
</div>
<form action='{{ route('buku.store') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="no" class="col-sm-2 col-form-label">No</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='no' value="{{ Session::get('no')}}" id="no">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kode_gabungan_final" class="col-sm-2 col-form-label">Kode Buku</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kode_gabungan_final' value="{{ Session::get('kode_gabungan_final')}}" id="kode_gabungan_final">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_masuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='tanggal_masuk' value="{{ Session::get('tanggal_masuk')}}" id="tanggal_masuk">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="judul_buku" class="col-sm-2 col-form-label">Judul Buku</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul_buku' value="{{ Session::get('judul_buku')}}" id="judul_buku">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='penulis' value="{{ Session::get('penulis')}}" id="penulis">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='penerbit' value="{{ Session::get('penerbit')}}" id="penerbit">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='isbn' value="{{ Session::get('isbn')}}" id="isbn">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="jenis_peminatan" class="col-sm-2 col-form-label">Jenis Peminatan</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='jenis_peminatan' value="{{ Session::get('jenis_peminatan')}}" id="jenis_peminatan">
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
            <label for="detail_jenis_peminatan" class="col-sm-2 col-form-label">Detail Jenis Peminatan</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='detail_jenis_peminatan' value="{{ Session::get('detail_jenis_peminatan')}}" id="detail_jenis_peminatan">
                    <option selected>.</option>
                    <option value="Linux">Linux</option>
                    <option value="Network Security">Network Security</option>
                    <option value="Computer Networks">Computer Networks</option>
                    <option value="Wireless Networks">Wireless Networks</option>
                    <option value="IT Governance">IT Governance</option>
                    <option value="Expert System">Expert System</option>
                    <option value="Embedded System">Embedded System</option>
                    <option value="Robotics">Robotics</option>
                    <option value="Fuzzy">Fuzzy</option>
                    <option value="Computer Architecture & Organizations">Computer Architecture & Organizations</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile Development">Mobile Development</option>
                    <option value="Programming Language">Programming Language</option>
                    <option value="Database">Database</option>
                    <option value="Information System">Information System</option>
                    <option value="Computer Graphics">Computer Graphics</option>
                    <option value="Matlab">Matlab</option>
                    <option value="Data Mining">Data Mining</option>
                    <option value="Cryptography">Cryptography</option>
                    <option value="Object-Oriented Programming">Object-Oriented Programming</option>
                    <option value="Algorithm & Data Structure">Algorithm & Data Structure</option>
                    <option value="Human Computer Interaction">Human Computer Interaction</option>
                    <option value="Data Communications">Data Communications</option>
                    <option value="Multimedia">Multimedia</option>
                    <option value="Game Development">Game Development</option>
                    
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kode_peminatan" class="col-sm-2 col-form-label">Kode Peminatan</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='kode_peminatan' value="{{ Session::get('kode_peminatan')}}" id="kode_peminatan">
                    <option selected>.</option>
                    <option value="E">Sistem Tertanam & Robotika</option>
                    <option value="M">Multimedia</option>
                    <option value="N">Jaringan & Keamanan Komputer</option>
                    <option value="P">Perangkat Lunak & Mobile Computing</option>
                    <option value="X">Diluar Peminatan</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kode_detail_jenis_peminatan" class="col-sm-2 col-form-label">Kode Detail Jenis Peminatan</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='kode_detail_jenis_peminatan' value="{{ Session::get('kode_detail_jenis_peminatan')}}" id="kode_detail_jenis_peminatan">
                    <option selected>.</option>
                    <option value="01">Linux</option>
                    <option value="02">Network Security</option>
                    <option value="03">Computer Networks</option>
                    <option value="04">Wireless Networks</option>
                    <option value="05">IT Governance</option>
                    <option value="06">Expert System</option>
                    <option value="07">Embedded System</option>
                    <option value="08">Robotics</option>
                    <option value="09">Fuzzy</option>
                    <option value="10">Computer Architecture & Organizations</option>
                    <option value="11">Web Development</option>
                    <option value="12">Mobile Development</option>
                    <option value="13">Programming Language</option>
                    <option value="14">Database</option>
                    <option value="15">Information System</option>
                    <option value="16">Computer Graphics</option>
                    <option value="17">Matlab</option>
                    <option value="18">Data Mining</option>
                    <option value="19">Cryptography</option>
                    <option value="20">Object-Oriented Programming</option>
                    <option value="21">Algorithm & Data Structure</option>
                    <option value="22">Human Computer Interaction</option>
                    <option value="23">Data Communications</option>
                    <option value="24">Multimedia</option>
                    <option value="25">Game Development</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kode_tahun" class="col-sm-2 col-form-label">Kode Tahun</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='kode_tahun' value="{{ Session::get('kode_tahun')}}" id="kode_tahun">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kode_nomor_urut_buku" class="col-sm-2 col-form-label">Kode Nomor Urut Buku</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='kode_nomor_urut_buku' value="{{ Session::get('kode_nomor_urut_buku')}}" id="kode_nomor_urut_buku">
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
