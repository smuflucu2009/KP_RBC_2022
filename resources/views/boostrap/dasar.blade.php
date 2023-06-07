<!DOCTYPE html>
<html lang="en">

<head>
    <nav class="navbar sticky-top navbar-expand-lg  navbar-light nav">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('asset/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"
            style="background-color: #FDFDFF">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Auth::check() && Auth::user()->role == 'admin')
                <div class="dropdown">
                    <li class="nav-item dropdown"> <button class="dropbtn"><span style="white-space:nowrap">Admin <label
                                class="arrow_down"></label></span></button> </li>
                    <div class="dropdown-content">
                        <a class="nav-link" aria-current="page" href="/buku/update_admin">Koleksi Tercetak</a>
                        <a class="nav-link" href="/skripsi/update_admin">Tugas Akhir Digital</a>
                        <a class="nav-link" href="/kp/update_admin">Kerja Praktek Digital</a>
                        <a class="nav-link" href="/buku/update_admin/pinjambuku">Peminjaman Buku</a>
                        <a class="nav-link" href="/postingan">Postingan & Galery</a>
                        <a class="nav-link" href="/pengunjung/admin">Data Pengunjung</a>
                        <a class="nav-link" href="/feedback/admin">Feedback RBC</a>
                        <a class="nav-link" href="/sumbangan_buku/admin">Sumbangan Buku RBC</a>
                    </div>
                </div>
                @endif
                @if (Auth::check() && Auth::user()->role == 'koor')
                <div class="dropdown">
                    <li class="nav-item dropdown"> <button class="dropbtn"><span style="white-space:nowrap">Koor <label
                                class="arrow_down"></label></span></button> </li>
                    <div class="dropdown-content">
                        <a class="nav-link" aria-current="page" href="/buku">Koleksi Tercetak</a>
                        <a class="nav-link" href="/skripsi">Tugas Akhir Digital</a>
                        <a class="nav-link" href="/kp">Kerja Praktek Digital</a>
                    </div>
                </div>
                @endif
                <div class="dropdown">
                    <li class="nav-item dropdown"><button class="dropbtn"> <span style="white-space:nowrap"> Profil <label
                                class="arrow_down"></label></span></button></li>
                    <div class="dropdown-content">
                        <a class="nav-link" href="/pustakawan">Pustakawan</a>
                        <a class="nav-link" href="/jam">Jam Layanan </a>
                        <a class="nav-link" href="/fasilitas">tata Tertib</a>
                    </div>
                </div>
                <div class="dropdown">
                    <li class="nav-item dropdown"> <button class="dropbtn"><span style="white-space:nowrap">Koleksi <label
                                class="arrow_down"></label></span></button> </li>
                    <div class="dropdown-content">
                        <a class="nav-link" aria-current="page" href="/buku">Koleksi Tercetak</a>
                        <a class="nav-link" href="/skripsi">Tugas Akhir Digital</a>
                        <a class="nav-link" href="/kp">Kerja Praktek Digital</a>
                        
                    </div>
                </div>
                <div class="dropdown">
                    <li class="nav-item dropdown"> <button class="dropbtn"><span style="white-space:nowrap">Fasilitas <label
                                class="arrow_down"></label></span></button> </li>
                    <div class="dropdown-content">
                        <a class="nav-link" href="/RuangBaca">Ruang Baca</a>
                        <a class="nav-link" href="/mobile">Mobile App</a>
                        
                    </div>
                </div>
                <li class="nav-item dropbtn"> <a href="/faq">FAQ</a> </li>
                @auth
                <li class="nav-item dropdown">
                    <button class="btn-primary btn-login" style="overflow: hidden"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                      </svg> {{ auth()->user()->nama }}
                    </button>
                    <div class="dropdown-content" aria-labelledby="navbarDropdown">
                      <div class="dropdown-divider"></div>
                      <form action="/logout" method="get">
                        @csrf
                          <button type="submit" class="dropwdown-item border-0 bg-white px-3"><i class="bi bi-box-arrow-right"></i>Logout</button>
                        </form>
                    </div>
                  </li>
                    @else
                    <button class="btn-primary float-right btn-login" onclick="location.href = '/login'">Login</button>
                @endauth
            </ul>
           
        </div>
    </nav>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="asset/logo_footer.png" sizes="192x192">
</head>

<body>
    @include('boostrap/pesan')
    @yield('isi_template')
</body>

<footer class="footer">
    <div class="row">
        <div class="col-sm-3">
            <img src="{{ asset('asset/logo_footer.png') }}"class="img-fluid" alt="Responsive image" style="margin-top: 10%">
        </div>
        <div class="col-sm-3">
            <h4> NEWS </h4>
            <p><a href="/"> >NEWS 1</a></p>
            <br>
            <p><a href="/"> >NEWS 2</a></p>
            <br>
            <p><a href="/"> >NEWS 3</a></p>
            <br>
            <p><a href="/"> >NEWS 4</a></p>
        </div>
        <div class="col-sm-3">
            <h4> KONTAK </h4>
            <p><strong>Alamat: </strong> Prof. H. Soedarto, SH Tembalang, Semarang, Indonesia 1269</p>
            <p><strong>Email: </strong> @undip.ac.id</p>
            <p><strong>No. Telepon: </strong> (024) 76480609 </p>
            <h4> Layanan </h4>
            <div class="row">
                <div class="col-sm-6">
                    <p><a href="https://digilib.undip.ac.id/">Digilib UNDIP</a></p>
                    <p><a href="https://lib.undip.ac.id/">Perpus UNDIP</a></p>
                    <p><a href="http://perpus.ft.undip.ac.id/">Perpus FT UNDIP</a></p>
                    <p><a href="https://tekkom.ft.undip.ac.id/">Tekkom UNDIP</a></p>
                </div>
                <div class="col-sm-6">
                    <p><a href="http://capstone-ta.ce.undip.ac.id/">Tekkom Capstone</a></p>
                    <p><a href="https://ejournal.undip.ac.id/?t=MTY2ODQ2MDAyMw==">E-Journal</a></p>
                    <p><a href="https://www.perpusnas.go.id/">Perpusnas</a></p>
                    <p><a href="https://digilib.undip.ac.id/">Helpdesk</a></p>
                </div>
            </div>
            </div>
            <div class="col-sm-3">
                <h4>LOKASI KAMPUS</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.642526581279!2d110.43760927486224!3d-7.051224192951058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708d3d9c55e8cb%3A0x67f23b9ef2c77c35!2sDepartement%20of%20Computer%20Engineering%2C%20Universitas%20Diponegoro!5e0!3m2!1sen!2sid!4v1684191073311!5m2!1sen!2sid" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</footer>
</footer>

</html>
