@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Buku</title>
</head>
<body>
    <div>
        <h1>Ini Halaman Buku</h1>
    </div>
    <div>
        <h2>Tidak ada buku ++, karna yang ++ sudah bnyak tersebar</h2>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/buku/update_admin' class="btn btn-primary">Update Buku</a>
        </div>
        <div class="pb-3">
            <form action="" method="GET" >
            <input type="search" name="caribuku" placeholder="Cari...">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        {{-- <div class="pb-3">
            <form action="" method="GET" >
            <input type="search" name="carijp" placeholder="Cari Jenis Peminatan">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div> --}}
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
                    <th class="col-md-1">Detail Buku</th>
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