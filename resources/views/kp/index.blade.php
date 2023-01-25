@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman KP</title>
</head>
<body>
    <div>
        <h1>Ini Halaman KP</h1>
    </div>
    <div>
        <h2>intinya isinya kp lah</h2>
    </div>
    </div>
    <a href="/kp/update_admin" class="btn btn-info">Update</a>
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
                    <th>Perusahaan</th>
                    <th>Pembimbing KP</th>
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
                    <td>{{ $join->perusahaan }}</td>
                    <td>{{ $join->nama_dosen }}</td>
                    <td>
                        <a href='{{ url('/kp/detail/'.$join->id_kp) }}' class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
              @endforeach
          </tbody>
    </table>
    </div>
</body>
@endsection
