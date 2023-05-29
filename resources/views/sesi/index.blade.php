@extends('boostrap/dasar2')
@section('isi_template')
<head>
    <title>Halaman Login</title>
</head>
<body>
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>LOGIN</h1>
        <form action="/sesi/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="number" name="nim" value="{{ Session::get('nim') }}"  class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
                <a href="/sesi/register" class="btn btn-info">REGISTER</a>
            </div>
        </form>
    </div>
</body>
@endsection
