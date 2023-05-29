@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Status Pinjam</title>
</head>
<body>
    <div>
        <h1>Halaman Status Peminjaman Buku</h1>
    </div>
    <a href="/buku/update_admin" class="btn btn-info">Kembali</a>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status Pengembalian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($joins as $join)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $join->nama }}</td>
                        <td>{{ $join->nim }}</td>
                        <td>{{ $join->kode_gabungan_final }}</td>
                        <td>{{ $join->judul_buku }}</td>
                        <td>{{ $join->tanggal_peminjaman}}</td>
                        <td>{{ $join->tanggal_pengembalian}}</td>
                        <td>{{ $join->kadaluarsa}}</td>
                        <td>
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen data ini?')" class="d-inline" action="{{ route('pinjamb.delete', $join->id_pinjam) }}" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
              </tbody>
        </table>
    </div>
</body>
@endsection
