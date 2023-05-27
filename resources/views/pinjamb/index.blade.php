@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Pinjam Buku</title>
</head>
<body>
    <div>
        <h1>Halaman Pinjam Buku</h1>
    </div>
    <div>
        <h2>Tidak menerima pinjol</h2>
    </div>
    <a href="/buku/update_admin" class="btn btn-info">Kembali</a>
    {{-- <a href="/buku/update_admin/pinjambuku/create" class="btn btn-info">+++</a>
    <a href="/buku/update_admin/pinjambuku/admin" class="btn btn-info">Khusus Admin</a> --}}
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
                            {{-- <a href="{{ route('buku.kembali', $join->kode_gabungan_final) }}" method="POST" class="btn btn-primary btn-sm">Kembalikan</a> --}}
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen data ini?')" class="d-inline" action="{{ route('pinjamb.delete', $join->id_pinjam) }}" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            @if ($join->status_pinjam === 'Pending')
                                <form action="{{ route('buku.approve', $join->id_pinjam) }}" method="POST">
                                    @csrf
                                    <button type="submit" name="submit" class="btn btn-info btn-sm">Approve</button>
                                </form>
                                <form action="{{ route('buku.deny', $join->id_pinjam) }}" method="POST">
                                    @csrf
                                    <button type="submit" name="submit">Deny</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                  @endforeach
              </tbody>
        </table>
    </div>
</body>
@endsection
