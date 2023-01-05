@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Artikel</title>
</head>
<body>
    <div>
        <h1>Ini Halaman Artikel</h1>
    </div>
    <div>
        <h2>Halaman isi berita gosip hangat mengenai Unchdip di negeri wakanda</h2>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/artikel/update_admin' class="btn btn-primary">Update Artikel</a>
        </div>
        <div class="pb-3">
            <form action="" method="GET" >
            <input type="search" name="caribuku" placeholder="Cari Buku">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">Judul Artikel</th>
                    <th class="col-md-1">Jenis Artikel</th>
                    <th class="col-md-1">Waktu Artikel</th>
                    <th class="col-md-1">Lebih Lanjut</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $item->judul_artikel}}</td>
                        <td>{{ $item->jenis_artikel}}</td>
                        <td>{{ $item->waktu_artikel}}</td>
                        <td>
                            <a href='{{ url('/artikel/detail/'.$item->id_artikel ) }}' class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
</body>
@endsection