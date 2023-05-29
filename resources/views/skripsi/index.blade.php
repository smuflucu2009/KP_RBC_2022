@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Skripsi</title>
</head>
<body>
    <div>
        <h1>Halaman Skripsi</h1>
    </div>
    @if (Auth::check() && Auth::user()->role == 'admin')
        <a href="/skripsi/update_admin" class="btn btn-info">Update</a>
    @endif
    <form action="/ta" method="get">
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
                    <td>{{ $join->namadosen1 }}</td>
                    <td>{{ $join->namadosen2 }}</td>
                    <td>
                        <a href='{{ url('/skripsi/detail/'.$join->id_skripsi) }}' class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
        {{ $joins->withQueryString()->links() }}
    </div>
</body>
@endsection
