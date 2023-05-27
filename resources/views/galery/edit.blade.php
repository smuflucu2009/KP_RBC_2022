@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Edit Galery</title>
<div>
    <a href="/galery" class="btn btn-secondary">Kembali</a>
    <h1>Ini halaman untuk edit galery</h1>
</div>
<form action='{{ route('galery.update', $joins->id) }}' method='post' enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="post_id" class="col-sm-2 col-form-label">ID Postingan yang ingin diganti</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='post_id' value="{{ $joins->post_id }}" id="post_id">
            </div>
        </div>
        @if ($joins->file)
        
        <img style="max-width:350px;max-height:350px" src="{{ url('storage/img/news').'/' . $joins->file}}"/>
        
        @endif
        <div class="mb-3 row">
            <label for="file" class="col-sm-2 col-form-label">Gambar Galery</label>
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
