@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Galery</title>
</head>
<body>
    <div>
        <a href="/galery/create" class="btn btn-primary">+++</a>
        <a href="/postingan" class="btn btn-warning">Postingan</a>
    </div>
    <div> 
        <form action={{ route('galery.cari') }} method="GET" >
            <input type="search" name="carigalery" placeholder="Cari data gallery .." value="{{ Request::get('carigalery')}}">
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
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach ($joins as $join)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $join->post_id }}</td>                    
                    <td>
                        @if ($join->file)
                            <img style="max-width:50px;max-height:50px" src="{{ url('storage/img/news').'/' . $join->file}}"/>
                        @endif
                    </td>
                    <td>
                        <a href='{{ url('/galery/edit/'.$join->id) }}' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('Yakin ingin menghapus permanen postingan ini?')" class="d-inline" action="{{ route('galery.delete', $join->id) }}" method="post">
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
