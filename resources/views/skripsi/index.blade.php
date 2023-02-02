@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Skripsi</title>
</head>
<body>
    <div>
        <h1>Halaman Skripsi</h1>
    </div>
    <div>
        <a href="/ta/update_admin" class="btn btn-info">Update</a>
    </div>
    <div> 
        <form action={{ route('ta.cari') }} method="GET" >
            <input type="search" name="cariTA" placeholder="Cari data TA .." value="{{ Request::get('cariTA')}}">
            <button class="btn btn-primary" type="submit">cari </button>
        </form>
    </div>
    <div>
        <a href="/ta" class="btn btn-danger">Reset</a>
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
            @php $no = 1; @endphp
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
                        <a href='{{ url('/ta/detail/'.$join->id_skripsi) }}' class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
              @endforeach
          </tbody>
    </table>
    </div>
</body>
@endsection
