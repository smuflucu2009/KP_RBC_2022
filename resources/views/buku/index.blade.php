@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Buku</title>
</head>
<body>
    <div>
        <h1>Halaman Buku</h1>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        @if (Auth::check() && Auth::user()->role == 'admin')
            <a href='/buku/update_admin' class="btn btn-primary">Update Buku</a>
        @endif
        {{-- <div class="pb-3">
            
        </div> --}}
        {{-- <div class="pb-3">
            <form action="" method="GET" >
            <input type="search" name="caribuku" placeholder="Cari...">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div> --}}
        <form action="/buku" method="get">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="" class="form-label">Kode Buku</label>
                    <input name="kode_gabungan_final" type="text" class="form-control" placeholder="Kode" value="{{isset($_GET['kode_gabungan_final']) ? $_GET['kode_gabungan_final'] : ''}}">  
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Judul Buku</label>
                    <input name="judul_buku" type="text" class="form-control" placeholder="Judul" value="{{isset($_GET['judul_buku']) ? $_GET['judul_buku'] : ''}}">  
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Penulis</label>
                    <input name="penulis" type="text" class="form-control" placeholder="Penulis" value="{{isset($_GET['penulis']) ? $_GET['penulis'] : ''}}">  
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Penerbit</label>
                    <input name="penerbit" type="text" class="form-control" placeholder="Penerbit" value="{{isset($_GET['penerbit']) ? $_GET['penerbit'] : ''}}">  
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Jenis Peminatan</label>
                    <select name="jenis_peminatan" class="form-select">
                        <option value="">-</option>
                        <option value="Sistem Tertanam & Robotika">Sistem Tertanam & Robotika</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Jaringan & Keamanan Komputer">Jaringan & Keamanan Komputer</option>
                        <option value="Perangkat Lunak & Mobile Computing">Perangkat Lunak & Mobile Computing</option>
                        <option value="Diluar Peminatan">Diluar Peminatan</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Detail Jenis Peminatan</label>
                    <select name="detail_jenis_peminatan" class="form-select">
                        <option value="">-</option>
                        <option value="Linux">Linux</option>
                        <option value="Network Security">Network Security</option>
                        <option value="Computer Networks">Computer Networks</option>
                        <option value="Wireless Networks">Wireless Networks</option>
                        <option value="IT Governance">IT Governance</option>
                        <option value="Expert System">Expert System</option>
                        <option value="Embedded System">Embedded System</option>
                        <option value="Robotics">Robotics</option>
                        <option value="Fuzzy">Fuzzy</option>
                        <option value="Computer Architecture & Organizations">Computer Architecture & Organizations</option>
                        <option value="Web Development">Web Development</option>
                        <option value="Mobile Development">Mobile Development</option>
                        <option value="Programming Language">Programming Language</option>
                        <option value="Database">Database</option>
                        <option value="Information System">Information System</option>
                        <option value="Computer Graphics">Computer Graphics</option>
                        <option value="Matlab">Matlab</option>
                        <option value="Data Mining">Data Mining</option>
                        <option value="Cryptography">Cryptography</option>
                        <option value="Object-Oriented Programming">Object-Oriented Programming</option>
                        <option value="Algorithm & Data Structure">Algorithm & Data Structure</option>
                        <option value="Human Computer Interaction">Human Computer Interaction</option>
                        <option value="Data Communications">Data Communications</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Game Development">Game Development</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                </div>
            </div>
        </form>
        <div class="pb-3">
            <a href='/buku' class="btn btn-danger">Reset Cari</a>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="col-md-1">Kode Buku</th>
                    <th class="col-md-1">Judul Buku</th>
                    <th class="col-md-1">Penulis</th>
                    <th class="col-md-1">Penerbit</th>
                    <th class="col-md-1">Jenis Peminatan</th>
                    <th class="col-md-1">Detail Jenis Peminatan</th>
                    <th class="col-md-1">Status Pinjam</th>
                    <th class="col-md-1">Detail Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->kode_gabungan_final}}</td>
                        <td>{{ $item->judul_buku}}</td>
                        <td>{{ $item->penulis}}</td>
                        <td>{{ $item->penerbit}}</td>
                        <td>{{ $item->jenis_peminatan}}</td>
                        <td>{{ $item->detail_jenis_peminatan}}</td>
                        <td>{{ $item->status_pinjam}}</td>
                        <td>
                            <a href='{{ url('/buku/detail/'.$item->kode_gabungan_final) }}' class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
</body>
@endsection