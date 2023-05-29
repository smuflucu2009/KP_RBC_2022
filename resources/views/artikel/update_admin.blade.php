@extends('boostrap/dasar1')
@section('isi_template1')
<head>
    <title>Halaman Update Artikel - Admin</title>
</head>
<body>
    <div>
        <h1>Ini Halaman Update Artikel (Khusus Admin)</h1>
    </div>
    <div>
        <h2>Kalem kalo ngedit gan...</h2>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/artikel' class="btn btn-primary">kembali</a>
        </div>
        <div class="d-flex justify-content-between pb-3">
            <a href="/artikel/update_admin/create" class="btn btn-primary">+++</a>
            <a href="#" class="btn btn-info">Recycle Bin</a>
        </div>
        <div class="pb-3">
            <form action="{{ route('artikel.cari') }}" method="GET" >
            <input type="search" name="cariartikel_update" placeholder="Cari artikel" value="{{ Request::get('cariartikel_update')}}">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <div class="pb-3">
            <a href='/artikel/update_admin' class="btn btn-danger btn-sm">Reset</a>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Judul Artikel</th>
                    <th class="col-md-1">Jenis Artikel</th>
                    <th class="col-md-1">Waktu Artikel</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->judul_artikel}}</td>
                        <td>{{ $item->jenis_artikel}}</td>
                        <td>{{ $item->waktu_artikel}}</td>
                        <td>
                            <a href='{{ url('/artikel/update_admin/edit/'.$item->id_artikel) }}' class="btn btn-warning btn-sm">Edit</a>
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