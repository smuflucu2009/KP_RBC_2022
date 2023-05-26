<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
<div class="w-50 center border rounded px-3 py-3 mx-auto">
    <h1>Register</h1>
    <form action="{{ route('register.create') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" value="{{ Session::get('nama') }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ Session::get('email') }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM / NIP</label>
            <input type="number" name="nim" value="{{ Session::get('nim') }}"  class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3 d-grid">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="mb-3 d-grid">
            <a href='/login' class="btn btn-warning">Login</a>
        </div>
    </form>
</div>
</body>
</html>
    

