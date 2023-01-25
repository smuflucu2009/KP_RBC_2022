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
            <a href="#" class="btn btn-info">Recycle Bin</a>
        </div>
        {{-- <div class="pb-3">
            <form action="{{ route('buku.cari') }}" method="GET" >
            <input type="search" name="caribuku_update" placeholder="Cari Buku" value="{{ Request::get('caribuku_update')}}">
            <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div> --}}
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
                            <a href='{{ url('/buku/update_admin/edit/'.$join->id_kp) }}' class="btn btn-warning btn-sm">Edit</a>
                            {{-- <form onsubmit="return confirm('Yakin ingin menghapus sementara data ini?')" class="d-inline" method="POST" action="{{ route('buku.softdelete', $item->kode_gabungan_final) }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">S.Del</button>
                            </form>
                            <form onsubmit="return confirm('Buku {{$item -> judul_buku}} sudah dipinjam?')" class="d-inline" method="POST" action="{{ route('buku.pinjam', $item->kode_gabungan_final) }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-info btn-sm">Pinjam</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@endsection