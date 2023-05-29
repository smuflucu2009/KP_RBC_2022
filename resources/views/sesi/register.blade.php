@extends('boostrap/dasar2')
@section('isi_template')
<title>Register User</title>
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>REGISTER</h1>
        <form action="/sesi/create" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">NAMA</label>
                <input type="text" name="nama" value="{{ Session::get('nama') }}"  class="form-control">
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" name="nim" value="{{ Session::get('nim') }}"  class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" name="submit" class="btn btn-primary">REGISTER</button>
                <a href="/sesi" class="btn btn-info">LOGIN</a>
            </div>
        </form>
</form>
@endsection
