@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Update Postingan - Admin</title>
</head>
<body>
    <div>
        <h1>Ini Halaman Update Postingan (Khusus Admin)</h1>
    </div>
    <div>
        <h2>Kalem kalo ngedit gan...</h2>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/postingan' class="btn btn-primary">kembali</a>
        </div>
        <div class="d-flex justify-content-between pb-3">
            <a href="/postingan/update_admin/create" class="btn btn-primary">+++</a>
            {{-- <a href="/postingan/update_admin/bin" class="btn btn-info">Recycle Bin</a> --}}
        </div>
        <div class="pb-3">
            <form action="{{ route('postingan.cari2') }}" method="GET" >
            <input type="search" name="caripostingan2" placeholder="Cari postingan.." value="{{ Request::get('caripostingan2')}}">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <div class="pb-3">
            <a href='/postingan/update_admin' class="btn btn-danger btn-sm">Reset</a>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Cover Gambar</th>
                    <th>Judul</th>
                    <th>Kategori Postingan</th>
                    <th>Waktu Postingan</th>
                    <th>Deskripsi Postingan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($joins as $join)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                        @if ($join->cover_gambar)
                            <img style="max-width:50px;max-height:50px" src="{{ url('storage\postingan\cover_image').'/' . $join->cover_gambar}}"/>
                        @endif
                        </td>
                        <td>{{ $join->judul }}</td>
                        <td>{{ $join->name_category }}</td>
                        <td>{{ $join->waktu_posting }}</td>
                        <td>{{ $join->deskripsi }}</td>
                        <td>
                            <a href='{{ url('/postingan/update_admin/detail/'.$join->id_posting) }}' class="btn btn-info btn-sm">Detail</a>
                            <a href='{{ url('/postingan/update_admin/edit/'.$join->id_posting) }}' class="btn btn-warning btn-sm">Edit</a>
                            {{-- <form onsubmit="return confirm('Yakin ingin menghapus sementara data ini?')" class="d-inline" method="POST" action="{{ route('postingan.softdelete', $join->id) }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">S.Del</button>
                            </form> --}}
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen data KP ini?')" class="d-inline" action="{{ route('postingan.delete', $join->id_posting) }}" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection