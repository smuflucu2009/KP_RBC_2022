@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Buat Galery</title>
<div>
    <a href="/galery" class="btn btn-secondary">Kembali</a>
    <h1>Ini halaman untuk galery</h1>
</div>
<form action='{{ route('galery.store') }}' method='post' enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="post_id" class="col-sm-2 col-form-label">ID Postingan yang ingin dibuat</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='post_id' value="{{ Session::get('post_id')}}" id="post_id">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="file" class="col-sm-2 col-form-label">Gambar</label>
            <div class="col-md-8">
                <input type="file" class="form-control" name="file" id="file">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Simpan</button>
        </div> 
    </div>
</form>
@endsection
