@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Daftar Hadir</title>
</head>
<body>

    <div class="land">
        <div class="bg-2" style="max-height: 50%">
            <div class="row" style="margin-left: 0%">
                <div class="col-sm-9" style="margin-top: 2%">
                    <form action={{ route('pengunjung.cari') }} method="GET">
                        <div class="input-group w-50">
                            <button type="submit" class="btn btn-light search_btn"> <span class="input-group-text"
                                    id="basic-addon1"style="background: none; border: none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                        class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                        </path>
                                    </svg> </span> </button>
                            <input type="search" name="caripengunjung" class="typeahead form-control search " placeholder="Nama Pengunjung" value="{{ Request::get('caripengunjung')}}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="land_header">
        <h1 class="index_header">Daftar Pengunjung RBC</h1>
    </div>
    
    <div class="overflow-scroll">
        <table class="table table-hover table_box">
            <thead class="head_table">
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
            <tbody class="content_table">
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
                            <button type="submit" name="submit" class="btn btn-danger btn-sm"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path
                                    d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                            </svg></button>
                        </form>
                    </td>
                </tr>
              @endforeach
          </tbody>
    </table>
    </div>
</body>
@endsection
