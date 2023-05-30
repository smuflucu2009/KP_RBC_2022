@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Pengunjung - Admin</title>
</head>
<body>
    <div> 
        <form action={{ route('pengunjung.cari') }} method="GET" >
            <input type="search" name="caripengunjung" placeholder="Cari data pengunjung .." value="{{ Request::get('caripengunjung')}}">
            <button class="btn btn-primary" type="submit">Cari </button>
        </form>
    </div>
    <div>
        <a href="/pengunjung/admin" class="btn btn-danger">Reset</a>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Angkatan</th>
                    <th>Keperluan Hadir</th>
                    <th>Waktu Hadir</th>
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
                    <td>{{ $join->angkatan }}</td>
                    <td>{{ $join->keperluan }}</td>
                    <td>{{ $join->waktu_post }}</td>
                    <td>
                        <form onsubmit="return confirm('Yakin ingin menghapus data pengunjung ini?')" class="d-inline" action="{{ route('pengunjung.delete', $join->id) }}" method="post">
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
