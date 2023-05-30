@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Feedback</title>
</head>
<body>
    <div> 
        <form action={{ route('feedback.cari') }} method="GET" >
            <input type="search" name="carifeedback" placeholder="Cari feedback .." value="{{ Request::get('carifeedback')}}">
            <button class="btn btn-primary" type="submit">Cari </button>
        </form>
    </div>
    <div>
        <a href="/feedback/admin" class="btn btn-danger">Reset</a>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Jenis Feedback</th>
                    <th>Penjelasan</th>
                    <th>Detail</th>
                    <th>Waktu Post</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach ($joins as $join)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $join->nama }}</td>
                    <td>{{ $join->kontak }}</td>
                    <td>{{ $join->jenis_feedback }}</td>
                    <td>{{ $join->penjelasan }}</td>
                    <td>{{ $join->penjelasan_rinci }}</td>
                    <td>{{ $join->waktu_post }}</td>
                    <td>
                        <form onsubmit="return confirm('Yakin ingin menghapus feedback ini?')" class="d-inline" action="{{ route('feedback.delete', $join->id) }}" method="post">
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
