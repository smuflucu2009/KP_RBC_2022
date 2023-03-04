@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman KP</title>
</head>
<body>
    <div>
        <h1>Halaman KP</h1>
    </div>
    <div>
        <a href="/kp/update_admin" class="btn btn-info">Update</a>
    </div>
    <form action="/kp" method="get">
        @csrf
        <div class="row mb-3">
            <div class="col-sm-3">
                <label for="" class="form-label">Nama Mahasiswa</label>
                <input name="name" type="text" class="form-control" placeholder="Nama" value="{{isset($_GET['name']) ? $_GET['name'] : ''}}">  
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label">NIM Mahasiswa</label>
                <input name="nim" type="text" class="form-control" placeholder="NIM" value="{{isset($_GET['nim']) ? $_GET['nim'] : ''}}">  
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label">Tahun</label>
                <input name="tahun" type="number" class="form-control" placeholder="Tahun" value="{{isset($_GET['tahun']) ? $_GET['tahun'] : ''}}">  
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label">Judul KP</label>
                <input name="judul" type="text" class="form-control" placeholder="Judul" value="{{isset($_GET['judul']) ? $_GET['judul'] : ''}}">  
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label">Nama Perusahaan</label>
                <input name="perusahaan" type="text" class="form-control" placeholder="Perusahaan" value="{{isset($_GET['perusahaan']) ? $_GET['perusahaan'] : ''}}">  
            </div>
            <div class="col-sm-3">
                <label for="" class="form-label">Lokasi Perusahaan</label>
                <input name="lokasi_perusahaan" type="text" class="form-control" placeholder="Lokasi Perusahaan" value="{{isset($_GET['lokasi_perusahaan']) ? $_GET['lokasi_perusahaan'] : ''}}">  
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
                <label for="" class="form-label">Dosen Pembimbing</label>
                <select name="nama_dosen" class="form-select">
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
        <a href="/kp" class="btn btn-danger">Reset</a>
    </div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <table class="table table-striped text-center">
            <thead>
                <tr>
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
            @foreach ($joins as $join)
                <tr>
                    <td>{{ $join->name }}</td>
                    <td>{{ $join->nim }}</td>
                    <td>{{ $join->nama_bidang }}</td>
                    <td>{{ $join->tahun }}</td>
                    <td>{{ $join->judul }}</td>
                    <td>{{ $join->perusahaan }}</td>
                    <td>{{ $join->nama_dosen }}</td>
                    {{-- <td>
                        @if ($join->file)
                            <img style="max-width:50px;max-height:50px" src="{{ url('pdf\kp').'/' . $join->file}}"/>
                        @endif
                    </td> --}}
                    <td>
                        <a href='{{ url('/kp/detail/'.$join->id_kp) }}' class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
        {{ $joins->withQueryString()->links() }}
    </div>
</body>
@endsection
