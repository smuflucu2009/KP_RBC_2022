@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Sumbangan</title>
</head>
<body>
    <div> 
        <form action={{ route('sumbangan.cari') }} method="GET" >
            <input type="search" name="carisumbangan" placeholder="Cari data Sumbangan .." value="{{ Request::get('carisumbangan')}}">
            <button class="btn btn-primary" type="submit">Cari </button>
        </form>
    </div>
    <div>
        <a href="/postingan" class="btn btn-danger">Reset</a>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa 1</th>
                    <th>Nama Mahasiswa 2</th>
                    <th>Nama Mahasiswa 3</th>
                    <th>Angkatan Wisuda</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Nama Pengarang</th>
                    <th>Waktu Menyumbang</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach ($joins as $join)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $join->nama }}</td>
                    <td>{{ $join->nama2 }}</td>
                    <td>{{ $join->nama3 }}</td>
                    <td>{{ $join->angkatan_wisuda }}</td>
                    <td>{{ $join->judul_buku }}</td>
                    <td>{{ $join->tahun_terbit }}</td>
                    <td>{{ $join->penulis }}</td>
                    <td>{{ $join->waktu_sumbang }}</td>
                    <td>
                        <a href='{{ url('/sumbangan_buku/admin/detail/'.$join->id) }}' class="btn btn-info btn-sm">Detail</a>
                    </td>
                    <td>
                        <a href='{{ url('/sumbangan_buku/admin/edit/'.$join->id) }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin ingin menghapus permanen data sumbangan ini?')" class="d-inline" action="{{ route('sumbangan.delete', $join->id) }}" method="post">
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
