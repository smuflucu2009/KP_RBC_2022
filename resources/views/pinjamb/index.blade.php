@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>HPeminjaman Buku</title>
</head>
<body>
    <div id="land_header">
        <h1 class="index_header">Halaman Admin: Peminjaman Buku</h1>
    </div>
    <div class="overflow-scroll">
        <table class="table table-hover table_box">
            <thead class="head_table">
                <tr>
                    <th class="col-md-2">Nama Mahasiswa</th>
                    <th class="col-md-1">NIM</th>
                    <th class="col-md-1">Kode Buku</th>
                    <th class="col-md-3">Judul Buku</th>
                    <th class="col-md-2">Tanggal Peminjaman</th>
                    <th class="col-md-2">Tanggal Pengembalian</th>
                    <th class="col-md-1">Status</th>
                    <th class="col-md-1">Aksi</th>
                </tr>
            </thead>
            <tbody class="content_table">
                @foreach ($joins as $join)
                    <tr>
                        <td>{{ $join->nama }}</td>
                        <td>{{ $join->nim }}</td>
                        <td>{{ $join->kode_gabungan_final }}</td>
                        <td>{{ $join->judul_buku }}</td>
                        <td>{{ $join->tanggal_peminjaman}}</td>
                        <td>{{ $join->tanggal_pengembalian}}</td>
                        <td>{{ $join->kadaluarsa}}</td>
                        <td>
                            @if ($join->status_pinjam === 'Menunggu')
                                <form action="{{ route('buku.approve', $join->kode_gabungan_final) }}" method="POST">
                                    @csrf
                                    <button type="submit" name="submit" class="btn btn-info btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                      </svg></button>
                                </form>
                            @endif
                            <form onsubmit="return confirm('Yakin ingin menghapus / menolak peminjaman buku ini?')" class="d-inline" action="{{ route('pinjamb.delete', $join->id_pinjam) }}" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                                    <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
                                  </svg></button>
                            </form>
                        </td>
                    </tr>
                  @endforeach
              </tbody>
        </table>
    </div>
</body>
@endsection
