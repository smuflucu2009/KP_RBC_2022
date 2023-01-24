@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Update Buku - Admin</title>
</head>
<body>
    <div>
        <h1>Ini Halaman Update Buku (Khusus Admin)</h1>
    </div>
    <div>
        <h2>Kalem kalo ngedit gan...</h2>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/buku' class="btn btn-primary">kembali</a>
        </div>
        <div class="d-flex justify-content-between pb-3">
            <a href="/buku/update_admin/create" class="btn btn-primary">+++</a>
            <a href="/buku/update_admin/pinjambuku" class="btn btn-warning">Pinjam Buku</a>
            <a href="/buku/update_admin/bin" class="btn btn-info">Recycle Bin</a>
        </div>
        <div class="pb-3">
            <form action="{{ route('buku.cari') }}" method="GET" >
            <input type="search" name="caribuku_update" placeholder="Cari Buku" value="{{ Request::get('caribuku_update')}}">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <div class="pb-3">
            <a href='/buku/update_admin' class="btn btn-danger btn-sm">Reset</a>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Kode Buku</th>
                    <th class="col-md-1">Judul Buku</th>
                    <th class="col-md-1">Penulis</th>
                    <th class="col-md-1">Penerbit</th>
                    <th class="col-md-1">Jenis Peminatan</th>
                    <th class="col-md-1">Detail Jenis Peminatan</th>
                    <th class="col-md-1">Status Pinjam</th>
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
                        <td>{{ $item->kode_gabungan_final}}</td>
                        <td>{{ $item->judul_buku}}</td>
                        <td>{{ $item->penulis}}</td>
                        <td>{{ $item->penerbit}}</td>
                        <td>{{ $item->jenis_peminatan}}</td>
                        <td>{{ $item->detail_jenis_peminatan}}</td>
                        <td>{{ $item->status_pinjam}}</td>
                        <td>
                            <a href='{{ url('/buku/update_admin/edit/'.$item->kode_gabungan_final) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus sementara data ini?')" class="d-inline" method="POST" action="{{ route('buku.softdelete', $item->kode_gabungan_final) }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">S.Del</button>
                            </form>
                            <form onsubmit="return confirm('Buku {{$item -> judul_buku}} sudah dipinjam?')" class="d-inline" method="POST" action="{{ route('buku.pinjam', $item->kode_gabungan_final) }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-info btn-sm">Pinjam</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</body>
@endsection