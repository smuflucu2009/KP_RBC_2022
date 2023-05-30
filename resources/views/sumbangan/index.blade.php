@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Postingan</title>
</head>
<body>
    <div>
        <h1>Halaman Postingan</h1>
    </div>
    <div>
        <a href="/postingan/create" class="btn btn-primary">+++</a>
        <a href="/galery" class="btn btn-warning">Galery</a>
    </div>
    <div> 
        <form action={{ route('postingan.cari') }} method="GET" >
            <input type="search" name="caripostingan" placeholder="Cari data Posting .." value="{{ Request::get('caripostingan')}}">
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
                    <th>ID Postingan</th>
                    <th>Cover Gambar</th>
                    <th>Judul</th>
                    <th>Kategori Postingan</th>
                    <th>Waktu Postingan</th>
                    <th>Lebih Lanjut</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach ($joins as $join)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $join->id_posting }}</td>
                    <td>
                        @if ($join->cover_gambar)
                            <img style="max-width:50px;max-height:50px" src="{{ url('storage\postingan\cover_image').'/' . $join->cover_gambar}}"/>
                        @endif
                    </td>
                    <td>{{ $join->judul }}</td>
                    <td>{{ $join->name_category }}</td>
                    <td>{{ $join->waktu_posting }}</td>
                    <td>
                        <a href='{{ url('/postingan/detail/'.$join->id_posting) }}' class="btn btn-info btn-sm">Detail</a>
                    </td>
                    <td>
                        <a href='{{ url('/postingan/edit/'.$join->id_posting) }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin ingin menghapus permanen postingan ini?')" class="d-inline" action="{{ route('postingan.delete', $join->id_posting) }}" method="post">
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
