<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Register</title>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>
<body class="panduan">
    <div class="container py-5 login">
<div class="w-50 center border rounded px-3 py-3 mx-auto land">
    <div class="col-sm-12 text-center">
        <img src="{{ asset('asset/logo-undip.png') }}"class="img-fluid logo_login">
    </div>
    <h1>Registrasi</h1>
    <h5 class="welcome"> <span> Silahkan daftar dengan email anda </span></h5>
    <form action="{{ route('register.create') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <div class="input-group">
                <span class="input-group-text"
                   id="basic-addon1"style="background: white; border: none">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                  </svg></span>
            <input type="text" name="nama" value="{{ Session::get('nama') }}"  class="form-control login_form" placeholder="Masukkan nama lengkap anda">
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text"
                   id="basic-addon1"style="background: white; border: none">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                       <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                       <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                   </svg> </span>
            <input type="email" name="email" value="{{ Session::get('email') }}"  class="form-control login_form" placeholder="masukkan email yang ingin anda daftarkan">
            </div>
        </div>
        <div class="mb-3">
            <label for="nim" class="form-label">NIM / NIP</label>
            <div class="input-group">
                <span class="input-group-text"
                   id="basic-addon1"style="background: white; border: none">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z"/>
                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z"/>
                  </svg></span>
            <input type="number" name="nim" value="{{ Session::get('nim') }}"  class="form-control login_form" placeholder="masukkan NIM/NIP anda">
            </div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <span class="input-group-text"
                   id="basic-addon1"style="background: white; border: none">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                  </svg> </span>
            <input type="password" name="password" class="form-control login_form" placeholder="masukkan kata sandi">
            </div>
        </div>
        <div class="mb-3 d-grid">
            <button type="submit" name="submit" class="btn btn-info form_submit">Daftar</button>
        </div>
        <div class="mb-3 d-grid">
            <a> sudah punya akun? </a>
            <a href='/login' style="color:yellow">Login di sini!</a>
        </div>
    </form>
</div>
    </div>
</body>
</html>
    

