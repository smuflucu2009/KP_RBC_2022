@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Update KP - Admin</title>
</head>
<body>
    <div>
        <h1>Ini Halaman Update KP (Khusus Admin)</h1>
    </div>
    <div>
        <h2>Kalem kalo ngedit gan...</h2>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/kp' class="btn btn-primary">kembali</a>
        </div>
        <div class="d-flex justify-content-between pb-3">
            <a href="/kp/update_admin/create" class="btn btn-primary">+++</a>
            {{-- <a href="#" class="btn btn-info">Recycle Bin</a> --}}
        </div>
        <div class="pb-3">
            <form action="{{ route('kp.cari2') }}" method="GET" >
            <input type="search" name="cariKP2" placeholder="Cari Buku" value="{{ Request::get('cariKP2')}}">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <div class="pb-3">
            <a href='/kp/update_admin' class="btn btn-danger btn-sm">Reset</a>
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
                    <th>Perusahaan</th>
                    <th>Pembimbing KP</th>
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
                        <td>{{ $join->perusahaan }}</td>
                        <td>{{ $join->nama_dosen }}</td>
                        <td>
                            <a href='{{ url('/kp/update_admin/edit/'.$join->id_kp) }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen data KP ini?')" class="d-inline" action="{{ route('kp.delete', $join->id_kp) }}" method="post">
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