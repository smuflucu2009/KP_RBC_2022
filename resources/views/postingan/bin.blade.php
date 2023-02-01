@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Recycle Bin - KP</title>
<div>
    <a href="/postingan/update_admin" class="btn btn-secondary">Kembali</a>
    <h1>Ini halaman untuk penyimpanan sementara sebelum dihapus permanen</h1>
</div>
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Cover Gambar</th>
                <th>Judul</th>
                <th>Kategori Postingan</th>
                <th>Waktu Postingan</th>
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
                    <td>
                        <a href="{{ route('postingan.restore', $join->id_postingan) }}" class="btn btn-primary btn-sm">Restore</a>
                        <form onsubmit="return confirm('Yakin ingin menghapus permanen data KP ini?')" class="d-inline" action="{{ route('postingan.delete', $join->id_postingan) }}" method="post">
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
