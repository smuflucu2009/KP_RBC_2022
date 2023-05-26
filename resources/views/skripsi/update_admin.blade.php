@extends('boostrap/dasar')
@section('isi_template')
<head>
    <title>Halaman Update Skripsi - Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div>
        <h1>Ini Halaman Update Skripsi (Khusus Admin)</h1>
    </div>
    <div>
        <h2>Kalem kalo ngedit gan...</h2>
    </div>
</div>
{{-- notifikasi form validasi --}}
@if ($errors->has('file'))
<span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('file') }}</strong>
</span>
@endif

{{-- notifikasi sukses --}}
@if ($sukses = Session::get('sukses'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $sukses }}</strong>
</div>
@endif
<div class="my-3 p-3 bg-body rounded shadow-sm">
<div class="pb-3">
    <a href='/skripsi' class="btn btn-primary">kembali</a>
</div>
<div class="d-flex justify-content-between pb-3">
    <a href="/skripsi/update_admin/create" class="btn btn-primary">+++</a>
    {{-- <a href="/skripsi/update_admin/export_excel" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> --}}
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="/buku/update_admin/import_excel" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
        IMPORT EXCEL
    </button>
    <form onsubmit="return confirm('Yakin ingin menghapus semua buku ?')" class="d-inline" action="{{ route('buku.delete_all') }}" method="POST">
        @csrf
        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete All</button>
    </form>
</div>
<!-- Import Excel -->

</div>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
@endsection
