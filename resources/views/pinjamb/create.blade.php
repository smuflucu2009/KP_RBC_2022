@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Peminjaman</title>
<div>
    <a href="/buku/update_admin/pinjambuku" class="btn btn-secondary">Kembali</a>
    <h1>Ini halaman peminjaman khusus admin</h1>
</div>
<form action='{{ route('pinjamb.store') }}' method='post'>
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="no" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_user' value="{{ Session::get('id_user')}}" id="id_user">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kode_gabungan_final" class="col-sm-2 col-form-label">Kode Buku</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kode_gabungan_final' value="{{ Session::get('kode_gabungan_final')}}" id="kode_gabungan_final">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_masuk" class="col-sm-2 col-form-label">Deadline Buku</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='akhir_pinjam' value="{{ Session::get('akhir_pinjam')}}" id="akhir_pinjam">
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
