@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Ruang Baca Teknik Komputer</title>
    </head>

    <body>
        <div class="land">
            <div class="bg-2">
                <div class="row">
                    <div class="col-md-12">
                        <button class="download" type="submit"
                            href="/"style="float: right; margin-right:5%; margin-top:2%">Mobile App <br> Download <br>
                            Here</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="panduan">
            <h3 id="pustakawan_header">Pustakawan</h3>
        </div>

        <div class="bg-profil overflow-scroll">
            <div class="row ">
                <div class="col-md-6">
                    <div class="pustakawan_reverse">
                        <div class="row" style="transform: rotate(-180deg)">
                            <div class="col-4">
                                <div class="card img_pustakawan">
                                    <div class="card-body">
                                        <img src="{{ asset('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhzPkPhRZU5PdN3WWv8_Ovsm2qxR9v5SgLBlvzH10ea4S_Krt9l6Y4PmyrsWDaZQB55cOgOYRLsW8CwYI57D8wm0UlwBllUWYI8qzfhsxtw2-MAEL6TvjIQ1Fj0y-jI4OXFM9sdnT9TQTSDgcAaSJIVkvryvttYyYVvpZ27910wd8wv8iCsNOMLlPRu/s1080/39_Girl-DP-Sohohindi.in_.jpeg') }}"
                                            class="card-img-top">
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card-body pustakawan_text">
                                    <p>Nama</p>
                                    <p>NIM</p>
                                    <p>Jurusan - Angkatan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pustakawan">
                        <div class="row">

                            <div class="col-8">
                                <div class="card-body pustakawan_text">
                                    <p>Nama</p>
                                    <p>NIM</p>
                                    <p>Jurusan - Angkatan</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card img_pustakawan">
                                    <div class="card-body">
                                        <img src="{{ asset('https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?cs=srgb&dl=pexels-mohamed-abdelghaffar-771742.jpg&fm=jpg') }}"
                                            class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="pustakawan_reverse">
                        <div class="row" style="transform: rotate(-180deg)">
                            <div class="col-4">
                                <div class="card img_pustakawan">
                                    <div class="card-body ">
                                        <img src="{{ asset('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhzPkPhRZU5PdN3WWv8_Ovsm2qxR9v5SgLBlvzH10ea4S_Krt9l6Y4PmyrsWDaZQB55cOgOYRLsW8CwYI57D8wm0UlwBllUWYI8qzfhsxtw2-MAEL6TvjIQ1Fj0y-jI4OXFM9sdnT9TQTSDgcAaSJIVkvryvttYyYVvpZ27910wd8wv8iCsNOMLlPRu/s1080/39_Girl-DP-Sohohindi.in_.jpeg') }}"
                                            class="card-img-top">
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card-body pustakawan_text">
                                    <p>Nama</p>
                                    <p>NIM</p>
                                    <p>Jurusan - Angkatan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pustakawan">
                        <div class="row">

                            <div class="col-8">
                                <div class="card-body pustakawan_text">
                                    <p>Nama</p>
                                    <p>NIM</p>
                                    <p>Jurusan - Angkatan</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card img_pustakawan">
                                    <div class="card-body">
                                        <img src="{{ asset('https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?cs=srgb&dl=pexels-mohamed-abdelghaffar-771742.jpg&fm=jpg') }}"
                                            class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="pustakawan_reverse">
                        <div class="row" style="transform: rotate(-180deg)">
                            <div class="col-4">
                                <div class="card img_pustakawan">
                                    <div class="card-body ">
                                        <img src="{{ asset('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhzPkPhRZU5PdN3WWv8_Ovsm2qxR9v5SgLBlvzH10ea4S_Krt9l6Y4PmyrsWDaZQB55cOgOYRLsW8CwYI57D8wm0UlwBllUWYI8qzfhsxtw2-MAEL6TvjIQ1Fj0y-jI4OXFM9sdnT9TQTSDgcAaSJIVkvryvttYyYVvpZ27910wd8wv8iCsNOMLlPRu/s1080/39_Girl-DP-Sohohindi.in_.jpeg') }}"
                                            class="card-img-top">
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card-body pustakawan_text">
                                    <p>Nama</p>
                                    <p>NIM</p>
                                    <p>Jurusan - Angkatan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pustakawan">
                        <div class="row">

                            <div class="col-8">
                                <div class="card-body pustakawan_text">
                                    <p>Nama</p>
                                    <p>NIM</p>
                                    <p>Jurusan - Angkatan</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card img_pustakawan">
                                    <div class="card-body">
                                        <img src="{{ asset('https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?cs=srgb&dl=pexels-mohamed-abdelghaffar-771742.jpg&fm=jpg') }}"
                                            class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="pustakawan_reverse">
                        <div class="row" style="transform: rotate(-180deg)">
                            <div class="col-4">
                                <div class="card img_pustakawan">
                                    <div class="card-body">
                                        <img src="{{ asset('https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhzPkPhRZU5PdN3WWv8_Ovsm2qxR9v5SgLBlvzH10ea4S_Krt9l6Y4PmyrsWDaZQB55cOgOYRLsW8CwYI57D8wm0UlwBllUWYI8qzfhsxtw2-MAEL6TvjIQ1Fj0y-jI4OXFM9sdnT9TQTSDgcAaSJIVkvryvttYyYVvpZ27910wd8wv8iCsNOMLlPRu/s1080/39_Girl-DP-Sohohindi.in_.jpeg') }}"
                                            class="card-img-top">
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="card-body pustakawan_text">
                                    <p>Nama</p>
                                    <p>NIM</p>
                                    <p>Jurusan - Angkatan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="pustakawan">
                        <div class="row">

                            <div class="col-8">
                                <div class="card-body pustakawan_text">
                                    <p>Nama</p>
                                    <p>NIM</p>
                                    <p>Jurusan - Angkatan</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="card img_pustakawan">
                                    <div class="card-body">
                                        <img src="{{ asset('https://images.pexels.com/photos/771742/pexels-photo-771742.jpeg?cs=srgb&dl=pexels-mohamed-abdelghaffar-771742.jpg&fm=jpg') }}"
                                            class="card-img-top" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection
