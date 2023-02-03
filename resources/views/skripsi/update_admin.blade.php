@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Update Skripsi - Admin</title>
</head>
<body>
    <div>
        <h1>Ini Halaman Update Skripsi (Khusus Admin)</h1>
    </div>
    <div>
        <h2>Kalem kalo ngedit gan...</h2>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/ta' class="btn btn-primary">kembali</a>
        </div>
        <div class="d-flex justify-content-between pb-3">
            <a href="/skripsi/update_admin/create" class="btn btn-primary">+++</a>
            {{-- <a href="/skripsi/update_admin/bin" class="btn btn-info">Recycle Bin</a> --}}
        </div>
        <div class="pb-3">
            <form action="{{ route('skripsi.cari2') }}" method="GET" >
            <input type="search" name="cariSkripsi2" placeholder="Cari TA.." value="{{ Request::get('cariSkripsi2')}}">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <div class="pb-3">
            <a href='/skripsi/update_admin' class="btn btn-danger btn-sm">Reset</a>
        </div>
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Bidang</th>
                    <th>Tahun</th>
                    <th>Judul</th>
                    <th>Dosen Pembimbing I</th>
                    <th>Dosen Pembimbing II</th>
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
                        <td>{{ $join->name }}</td>
                        <td>{{ $join->nim }}</td>
                        <td>{{ $join->nama_bidang }}</td>
                        <td>{{ $join->tahun }}</td>
                        <td>{{ $join->judul }}</td>
                        <td>{{ $join->namadosen1 }}</td>
                        <td>{{ $join->namadosen2 }}</td>                       
                        <td>
                            @if ($join->file)
                                <a class="btn btn-success btn-sm" href="{{ asset('storage/pdf/skripsi/'. $join->file)}}">Lihat File</a>
                            @endif
                        </td>
                        <td>
                            <a href='{{ url('/skripsi/update_admin/edit/'.$join->id_skripsi) }}' class="btn btn-warning btn-sm">Edit</a>
                            {{-- <form onsubmit="return confirm('Yakin ingin menghapus sementara data ini?')" class="d-inline" method="POST" action="{{ route('skripsi.softdelete', $join->id_skripsi) }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">S.Del</button>
                            </form> --}}
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen data KP ini?')" class="d-inline" action="{{ route('skripsi.delete', $join->id_skripsi) }}" method="post">
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