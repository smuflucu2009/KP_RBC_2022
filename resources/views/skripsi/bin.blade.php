@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Recycle Bin - KP</title>
<div>
    <a href="/skripsi/update_admin" class="btn btn-secondary">Kembali</a>
    <h1>Ini halaman untuk penyimpanan sementara sebelum dihapus permanen</h1>
</div>
<div class="my-3 p-3 bg-body rounded shadow-sm">
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
                    <td>{{ $join->nama_dosen }}</td>
                    <td>{{ $join->nama_dosen2 }}</td> 
                    <td>
                        <a href="{{ route('skripsi.restore', $join->id_skripsi) }}" class="btn btn-primary btn-sm">Restore</a>
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
@endsection
