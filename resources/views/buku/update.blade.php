@extends('boostrap/dasar1')
@section('isi_template1')
<head>
    <title>Halaman Buku</title>
</head>
<body>
    <div>
        <h1>Ini Halaman Update Buku (Khusus Admin)</h1>
    </div>
    <div>
        <h2>Kalem kalo ngedit gan...</h2>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        {{-- <div class="pb-3">
            <form action={{ route('gunpla.cari') }} method="GET" >
            <input type="search" name="carigunpla" placeholder="Cari gunpla .." value="{{ Request::get('carigunpla')}}">
            <button class="btn btn-primary" type="submit">cari </button>
            </form>
        </div> --}}
        <div class="pb-3">
            <a href='/buku' class="btn btn-primary">kembali</a>
        </div>
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-primary">+++</a>
            <a href="#" class="btn btn-info">Recycle Bin</a>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Judul Buku</th>
                    <th class="col-md-1">Penulis</th>
                    <th class="col-md-1">Jenis Peminatan</th>
                    <th class="col-md-1">Detail Jenis Peminatan</th>
                    <th class="col-md-1">Kode Buku</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $item->judul_buku}}</td>
                        <td>{{ $item->penulis}}</td>
                        <td>{{ $item->jenis_peminatan}}</td>
                        <td>{{ $item->detail_jenis_peminatan}}</td>
                        <td>{{ $item->kode_gabungan_final}}</td>
                        <td>
                            <a href='#' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus sementara data ini?')" class="d-inline" method="POST" action="#">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">S.Del</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection