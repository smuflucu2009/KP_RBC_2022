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
    <a href="/buku/update_admin/pinjambuku/create" class="btn btn-info">+++</a>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Status Pinjam</th>
                    <th>Awal Pinjam</th>
                    <th>Deadline Pinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($joins as $join)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $join->nama_user }}</td>
                        <td>{{ $join->id_user }}</td>
                        <td>{{ $join->kode_gabungan_final }}</td>
                        <td>{{ $join->judul_buku }}</td>
                        <td>{{ $join->status_pinjam }}</td>
                        <td>{{ $join->awal_pinjam }}</td>
                        <td>{{ $join->akhir_pinjam }}</td>
                        <td>
                            <a href="{{ route('buku.kembali', $join->id_buku) }}" method="POST" class="btn btn-primary btn-sm">Kembalikan</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen data ini?')" class="d-inline" action="{{ route('pinjamb.delete', $join->id) }}" method="post">
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
