@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Recycle Bin - Buku</title>
<div>
    <a href="/buku/update_admin" class="btn btn-secondary">Kembali</a>
    <h1>Ini halaman untuk menyimpan buku yang ingin dihapus tpi ingin disimpan</h1>
</div>
<div class="my-3 p-3 bg-body rounded shadow-sm">
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
                <th class="col-md-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->kode_gabungan_final}}</td>
                    <td>{{ $item->judul_buku}}</td>
                    <td>{{ $item->penulis}}</td>
                    <td>{{ $item->penerbit}}</td>
                    <td>{{ $item->jenis_peminatan}}</td>
                    <td>{{ $item->detail_jenis_peminatan}}</td>
                    <td>
                        <a href="{{ route('buku.restore', $item->id) }}" class="btn btn-primary btn-sm">Restore</a>
                        <form onsubmit="return confirm('Yakin ingin menghapus permanen data ini?')" class="d-inline" action="{{ route('buku.delete', $item->id) }}" method="post">
                            @csrf
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">H.Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
