@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Update Skripsi - Admin</title>
</head>
<body>
    <div>
        <h1>Ini Halaman Update Skripsi (Khusus Admin)</h1>
    </div>
    <div>
        <h2>Kalem kalo ngedit gan...</h2>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <a href='/ta' class="btn btn-primary">kembali</a>
        </div>
        <div class="d-flex justify-content-between pb-3">
            <a href="/skripsi/update_admin/create" class="btn btn-primary">+++</a>
            {{-- <a href="/skripsi/update_admin/bin" class="btn btn-info">Recycle Bin</a> --}}
        </div>
        <form action="/skripsi/update_admin" method="get">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-3">
                    <label for="" class="form-label">Nama Mahasiswa</label>
                    <input name="name" type="text" class="form-control" placeholder="Nama" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">  
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">NIM Mahasiswa</label>
                    <input name="nim" type="number" class="form-control" placeholder="NIM" value="{{isset($_GET['nim']) ? $_GET['nim'] : ''}}">  
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Judul TA</label>
                    <input name="judul" type="text" class="form-control" placeholder="Judul" value="{{isset($_GET['judul']) ? $_GET['judul'] : ''}}">  
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Tahun</label>
                    <input name="tahun" type="number" class="form-control" placeholder="Tahun" value="{{isset($_GET['tahun']) ? $_GET['tahun'] : ''}}">  
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Jenis Bidang</label>
                    <select name="nama_bidang" class="form-select">
                        <option value="">-</option>
                        <option value="RPL">RPL</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Jaringan">Jaringan</option>
                        <option value="Embedded">Embedded</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Pembimbing Dosen I</label>
                    <select name="namadosen1" class="form-select">
                        <option value="">-</option>
                        <option value="Dania Eridani S.T., M.Eng">Dania Eridani S.T., M.Eng</option>
                        <option value="Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE">Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE</option>
                        <option value="Eko Didik Widianto S.T., M.T.">Eko Didik Widianto S.T., M.T.</option>
                        <option value="Rinta Kridalukmana, M.Kom., MT., PhD">Rinta Kridalukmana, M.Kom., MT., PhD</option>
                        <option value="Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM">Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM</option>
                        <option value="Kurniawan Teguh Martono S.T., M.T.">Kurniawan Teguh Martono S.T., M.T.</option>
                        <option value="Risma Septiana S.T., M.Eng.">Risma Septiana S.T., M.Eng.</option>
                        <option value="Ike Pertiwi Windasari S.T., M.T.">Ike Pertiwi Windasari S.T., M.T.</option>
                        <option value="Adnan Fauzi S.T., M.Kom.">Adnan Fauzi S.T., M.Kom.</option>
                        <option value="Dr. Oky Dwi Nurhayati S.T., M.T.">Dr. Oky Dwi Nurhayati S.T., M.T.</option>
                        <option value="Agung Budi Prasetijo S.T., M.I.T., Ph.D.">Agung Budi Prasetijo S.T., M.I.T., Ph.D.</option>
                        <option value="Patricia Evericho Mountaines, S.T., M.Cs.">Patricia Evericho Mountaines, S.T., M.Cs.</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <label for="" class="form-label">Pembimbing Dosen II</label>
                    <select name="namadosen2" class="form-select">
                        <option value="">-</option>
                        <option value="Dania Eridani S.T., M.Eng">Dania Eridani S.T., M.Eng</option>
                        <option value="Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE">Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE</option>
                        <option value="Eko Didik Widianto S.T., M.T.">Eko Didik Widianto S.T., M.T.</option>
                        <option value="Rinta Kridalukmana, M.Kom., MT., PhD">Rinta Kridalukmana, M.Kom., MT., PhD</option>
                        <option value="Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM">Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM</option>
                        <option value="Kurniawan Teguh Martono S.T., M.T.">Kurniawan Teguh Martono S.T., M.T.</option>
                        <option value="Risma Septiana S.T., M.Eng.">Risma Septiana S.T., M.Eng.</option>
                        <option value="Ike Pertiwi Windasari S.T., M.T.">Ike Pertiwi Windasari S.T., M.T.</option>
                        <option value="Adnan Fauzi S.T., M.Kom.">Adnan Fauzi S.T., M.Kom.</option>
                        <option value="Dr. Oky Dwi Nurhayati S.T., M.T.">Dr. Oky Dwi Nurhayati S.T., M.T.</option>
                        <option value="Agung Budi Prasetijo S.T., M.I.T., Ph.D.">Agung Budi Prasetijo S.T., M.I.T., Ph.D.</option>
                        <option value="Patricia Evericho Mountaines, S.T., M.Cs.">Patricia Evericho Mountaines, S.T., M.Cs.</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary mt-4">Search</button>
                </div>
            </div>
        </form>
        <div class="pb-3">
            <a href='/skripsi/update_admin' class="btn btn-danger btn-sm">Reset</a>
        </div>
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
                        <td>{{ $join->namadosen1 }}</td>
                        <td>{{ $join->namadosen2 }}</td>
                        <td>
                            @if ($join->file)
                                <a class="btn btn-success btn-sm" href="{{ asset('storage/pdf/skripsi/'. $join->file)}}">Lihat File</a>
                            @endif
                        </td>
                        <td>
                            <a href='{{ url('/skripsi/update_admin/edit/'.$join->id_skripsi) }}' class="btn btn-warning btn-sm">Edit</a>
                            {{-- <form onsubmit="return confirm('Yakin ingin menghapus sementara data ini?')" class="d-inline" method="POST" action="{{ route('skripsi.softdelete', $join->id_skripsi) }}">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">S.Del</button>
                            </form> --}}
                            <form onsubmit="return confirm('Yakin ingin menghapus permanen data KP ini?')" class="d-inline" action="{{ route('skripsi.delete', $join->id_skripsi) }}" method="post">
                                @csrf
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $joins->withQueryString()->links() }}
    </div>
</body>
@endsection
