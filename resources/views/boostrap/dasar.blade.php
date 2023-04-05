<!DOCTYPE html>
<html lang="en">

<head>
    <nav class="navbar sticky-top navbar-expand-lg  navbar-light nav">
        <a class="navbar-brand" href="/">
            <img src="{{asset('asset/logo.png')}}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="background-color: #FDFDFF">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <div class="dropdown">
                    <li class="nav-item dropdown"><button class="dropbtn"> <span style="white-space:nowrap"> Profil <label
                                class="arrow_down"></label></span></button></li>
                    <div class="dropdown-content">
                        <a class="nav-link" href="/pustakawan">Pustakawan</a>
                        <a class="nav-link" href="/visi">Visi & Misi</a>
                        <a class="nav-link" href="/jam">Jam Layanan </a>
                    </div>
                </div>
                <div class="dropdown">
                    <li class="nav-item dropdown"> <button class="dropbtn"><span style="white-space:nowrap">Koleksi <label
                                class="arrow_down"></label></span></button> </li>
                    <div class="dropdown-content">
                        <a class="nav-link" aria-current="page" href="/buku">Koleksi Tercetak</a>
                        <a class="nav-link" href="/ta">Tugas Akhir Digital</a>
                        <a class="nav-link" href="/kp">Kerja Praktek Digital</a>
                        <a class="nav-link" href="/kd">Karya Dosen Terindeks Scopus</a>
                    </div>
                </div>
                <div class="dropdown">
                    <li class="nav-item dropdown"> <button class="dropbtn"><span style="white-space:nowrap">Fasilitas <label
                                class="arrow_down"></label></span></button> </li>
                    <div class="dropdown-content">
                        <a class="nav-link" href="/RuangBaca">Ruang Baca</a>
                        <a class="nav-link" href="/mobile">Mobile App</a>
                        <a class="nav-link" href="/fasilitas">tata Tertib</a>
                    </div>
                </div>
                <li class="nav-item dropbtn"> <a href="/faq">FAQ</a> </li>

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Hello, {{ auth()->user()->nama }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                    @else
                    <button class="btn-primary float-right btn-login" onclick="location.href = '/sesi'">Login</button>
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
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="icon" href="asset/logo_footer.png" sizes="192x192">
</head>

<body>
    @include('boostrap/pesan')
    @yield('isi_template')
</body>

<footer class="footer">
    <div class="row" style="padding-top: 67px">
        <div class="col-sm-3">
            <img src="{{asset('asset/logo_footer.png')}}"class="img-fluid" alt="Responsive image">
        </div>
        <div class="col-sm-3">
            <h4> KONTAK </h4>
            <p><strong>Alamat: </strong> Prof. H. Soedarto, SH Tembalang, Semarang, Indonesia 1269</p>
            <p><strong>Email: </strong> @undip.ac.id</p>
            <p><strong>No. Telepon: </strong> (024) 76480609 </p>
        </div>
        <div class="col-sm-3">
            <h4> Layanan </h4>
            <p><a href="https://digilib.undip.ac.id/">Digilib UNDIP</a></p>
            <p><a href="https://lib.undip.ac.id/">Perpus UNDIP</a></p>
            <p ><a href="http://perpus.ft.undip.ac.id/">Perpus FT UNDIP</a></p>
            <p ><a href="https://tekkom.ft.undip.ac.id/">Tekkom UNDIP</a></p>
            <p ><a href="http://capstone-ta.ce.undip.ac.id/">Tekkom Capstone</a></p>
            <p ><a href="https://ejournal.undip.ac.id/?t=MTY2ODQ2MDAyMw==">E-Journal</a></p>
            <p ><a href="https://www.perpusnas.go.id/">Perpusnas</a></p>
        </div>
        <div class="col-sm-3">
          <h4><br></h4>
          <p ><a href="https://digilib.undip.ac.id/">Helpdesk</a></p>
            <p ><a href="https://lib.undip.ac.id/">Undip Career Center</a></p>
            <p>Ruang Tata Usaha Dept. Tekkom: Lt. 1 Gd. Departemen Teknik Komputer (Sebelah Dekanat Lama)
            </p>
        </div>
    </div>
    </div>
</footer>

</html>
