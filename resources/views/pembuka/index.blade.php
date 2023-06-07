@extends('boostrap/dasar')
@section('isi_template')

    <head>
        <title>Ruang Baca Computer Engineering</title>
    </head>

    <body>
        <div class="land">
            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="bg">
                            <div class="row">
                                <div class="col-sm-12" style="margin-top: 1%">
                                    <h1>RUANG BACA <br> COMPUTER ENGINEERING <br></h1>
                                    <button class="download" type="submit" href="/">Mobile App <br> Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="bg">
                            <img src="{{ asset('asset/2022-05-20.jpeg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <h1>RUANG BACA <br> COMPUTER ENGINEERING <br></h1>
                                <button class="download" type="submit" href="/">Mobile App <br> Download</button>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('asset/2022-09-23.jpeg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <h1>RUANG BACA <br> COMPUTER ENGINEERING <br></h1>
                            <button class="download" type="submit" href="/">Mobile App <br> Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panduan">
            <div>
                <h3 id="land_header">PANDUAN</h3>
                <div class="d-flex justify-content-center btn_panduan">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-body p-0 d-flex flex-column">
                                    <div class="row h-100">
                                        <a class="card-block stretched-link" href="https://docs.google.com/forms/d/e/1FAIpQLSfyZz9He0__48n6PXslXLQrTaWKfjLg6UvWZmAQWGQr-yRfdw/viewform" target="_blank">
                                        <div class="col-sm-6 d-flex flex-column">
                                            <a>Peminjaman Buku</a>
                                        </div>
                                        <div class="col-sm-6 text-right"><img src="{{ asset('asset/buku.png') }}" class="card-img img-fluid" alt="" /></div>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-0 d-flex flex-column">
                                    <div class="row h-100">
                                        <a class="card-block stretched-link" href="https://tekkom.ft.undip.ac.id/pendidikan/kerja-praktek" target="_blank">
                                        <div class="col-sm-6 d-flex flex-column">
                                            <a >Kerja Praktek</a>
                                        </div>
                                        <div class="col-sm-6 text-right"><img src="{{ asset('asset/kp.png') }}" class="card-img img-fluid" alt=""/></div>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body p-0 d-flex flex-column">
                                    <div class="row h-100">
                                        <a class="card-block stretched-link" href="http://capstone-ta.ce.undip.ac.id/" target="_blank">
                                        <div class="col-sm-6 d-flex flex-column">
                                            <a >Capstone</a> 
                                        </div>
                                        <div class="col-sm-6 text-right"><img src="{{ asset('asset/capstone.png') }}" class="card-img img-fluid" alt="" /></div>
                                    </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 id="land_header">FORMS</h3>
                <div class="d-flex justify-content-center">
                    <div class="forms">
                        {{-- <a href="https://docs.google.com/forms/d/e/1FAIpQLSfyZz9He0__48n6PXslXLQrTaWKfjLg6UvWZmAQWGQr-yRfdw/viewform"
                        target="_blank">PEMINJAMAN <br>
                        BUKU</a> --}}
                        <a href="/pengunjung">PENGUNJUNG <br>
                            PERPUS</a>
                        <a href="/sumbangan_buku">SUMBANGAN <br> BUKU</a>
                        <a href="/feedback">FEEDBACK <br> US </a>
                    </div>
                </div>
            </div>


            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1" style="background-color: #4EA8DE;"></button>
                    <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" aria-label="Slide 2"
                        style="background-color: #4EA8DE;"></button>
                    <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" aria-label="Slide 3"
                        style="background-color: #4EA8DE;"></button>
                </div>
                <div class="carousel-inner">
                    @foreach($joins->chunk(3) as $chunk)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="500">
                        <div class="cards-wrapper">
                            @foreach($chunk as $join)
                            <div class="card news">
                                <img style="max-width:350px;max-height:350px" src="{{ url('storage/postingan/cover_gambar').'/' . $join->cover_gambar}}" class="card-img-top" alt="...">
                                {{-- <img src="{{ $join->cover_gambar }}" class="card-img-top" alt="..."> --}}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $join->judul }}</h5>
                                    <p class="card-text">{!! strip_tags($join->deskripsi, '<strong><em><u>') !!}</p>
                                    <a href="{{ url('/postingan/detail/'.$join->id_posting) }}" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- <div class="carousel-inner">
                    @foreach($joins as $join)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="500">
                        <div class="cards-wrapper">
                            <div class="card news">
                                <img src="{{ $join->cover_gambar }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $join->judul }}</h5>
                                    <p class="card-text">{{ $join->deskripsi }}</p>
                                    <a href="#" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> --}}
                {{-- <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="500">
                        <div class="cards-wrapper">
                            <div class="card news">
                                <img src="https://picsum.photos/900/500?image=1" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Research news</h5>
                                    <p class="card-text">Lorem ipsum dolor sit amet. Ut cumque temporibus quo libero
                                        quaerat sit
                                        molestiae nemo quo dolores voluptate vel magnam deleniti. Ut suscipit facere id
                                        excepturi voluptas vel repellendus voluptatem qui quia distinctio ex odio molestias
                                        et
                                        eius voluptas et sapiente excepturi!

                                        Et voluptas ullam et culpa quas qui facere molestias est ullam aliquam qui sunt
                                        rerum!
                                        Cum voluptatibus porro non quia iure non quasi consectetur ut dignissimos voluptas
                                        cum
                                        quisquam animi. Qui obcaecati praesentium sit unde sunt aut sint asperiores et
                                        tenetur
                                        architecto ex dolorem repudiandae quo aspernatur eaque 33 sunt tempore.

                                        In adipisci tempora aut optio autem rem quos esse non fugit consequuntur qui fugiat
                                        commodi ut sunt aliquam. A nisi dolorem rem dolores porro ut sint ducimus. Sed autem
                                        enim in nostrum Quis aut quod distinctio a perspiciatis impedit non deleniti
                                        temporibus.
                                        Sit minus voluptatibus et totam facilis ut ipsa consequatur ut omnis odio.</p>
                                    <a href="#" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                            <div class="card d-none d-md-block news">
                                <img src="https://picsum.photos/900/500?image=1" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Get dari nama postingan</h5>
                                    <p class="card-text">get dari postingan</p>
                                    <a href="" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                            <div class="card d-none d-md-block news">
                                <img src="https://picsum.photos/900/500?image=1" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Research news 3</h5>
                                    <p class="card-text">Description</p>
                                    <a href="#" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="500">
                        <div class="cards-wrapper">
                            <div class="card news">
                                <img src="https://picsum.photos/900/500?image=1" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Research news 4</h5>
                                    <p class="card-text">Description</p>
                                    <a href="#" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                            <div class="card d-none d-md-block news">
                                <img src="https://picsum.photos/900/500?image=1" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Research news 5</h5>
                                    <p class="card-text">Description</p>
                                    <a href="#" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                            <div class="card d-none d-md-block news">
                                <img src="https://picsum.photos/900/500?image=1" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Research news 6</h5>
                                    <p class="card-text">Description</p>
                                    <a href="#" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="500">
                        <div class="cards-wrapper">
                            <div class="card news">
                                <img src="https://picsum.photos/900/500?image=1" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Research news 7</h5>
                                    <p class="card-text">Description</p>
                                    <a href="#" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                            <div class="card d-none d-md-block news">
                                <img src="https://picsum.photos/900/500?image=1" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Research news 8</h5>
                                    <p class="card-text">Description</p>
                                    <a href="#" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                            <div class="card d-none d-md-block news">
                                <img src="https://picsum.photos/900/500?image=1" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">Research news 9</h5>
                                    <p class="card-text">Description</p>
                                    <a href="#" class="btn btn-light news_btn">Learn More ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <a class="carousel-control-prev" href="#carouselExampleInterval" type="button"
                    data-bs-target="#carouselExampleInterval" data-bs-slide="prev"
                    style="background: #70C183; border-radius: 50%; width: 7vh; height: 7vh; top: 45%; margin-left: 3%">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Prev</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleInterval" type="button"
                    data-bs-target="#carouselExampleInterval" data-bs-slide="next"
                    style="background: #4EA8DE; border-radius: 50%; width: 7vh; height: 7vh; top: 45%; margin-right: 3%">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
                </button>
            </div>
            <div>
                <h3 id="land_header">E-RESOURCES</h3>
            </div>
            <div id="carouselExampleControls" class="carousel slide carousel-dark " data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="500">
                        <div class="cards-wrapper">
                            <div class="card">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://www.sciencedirect.com"
                                    target="_blank"> <img src="asset/gambar 6.png" class="card-img-top" alt="...">
                                </a>
                            </div>
                            <div class="card d-none d-md-block">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://www.scopus.com/home.url"
                                    target="_blank"><img src="asset/gambar 7.png" alt="..."> </a>
                            </div>
                            <div class="card d-none d-md-block">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://link.springer.com"
                                    target="_blank"><img src="asset/gambar 8.png" alt="..."> </a>
                            </div>
                            <div class="card d-none d-md-block">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://www.nature.com"
                                    target="_blank"><img src="asset/gambar 9.png" alt="..."> </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="500">
                        <div class="cards-wrapper">
                            <div class="card">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://www.cambridge.org/core"
                                    target="_blank"><img src="asset/gambar 10.png" alt="..."> </a>
                            </div>
                            <div class="card d-none d-md-block">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://www.emerald.com/insight"
                                    target="_blank"><img src="asset/gambar 11.png" alt="..."> </a>
                            </div>
                            <div class="card d-none d-md-block">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://www.emerald.com/insight"
                                    target="_blank"><img src="asset/gambar 12.png" alt="..."> </a>
                            </div>
                            <div class="card d-none d-md-block">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://www.proquest.com"
                                    target="_blank"><img src="asset/gambar 13.png" alt="..."> </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="500">
                        <div class="cards-wrapper">
                            <a href="https://ejournal.undip.ac.id/?t=MTY2ODQ2MDAyMw==" target="_blank"> <img
                                    src="asset/gambar 20.png">
                            </a>
                            <div class="card d-none d-md-block">
                                <a href="https://www.ieee.org/" target="_blank"> <img src="asset/gambar 21.png"> </a>
                            </div>
                            <div class="card d-none d-md-block">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://www.embase.com"
                                    target="_blank">
                                    <img src="asset/gambar 22.png">
                                </a>
                            </div>
                            <div class="card d-none d-md-block">
                                <a href="https://login.proxy.undip.ac.id/login?url=https://ascelibrary.org"
                                    target="_blank">
                                    <img src="asset/gambar 19.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
    </body>
@endsection
