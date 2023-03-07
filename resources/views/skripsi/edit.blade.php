@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Edit {{$joins->judul}}</title>
<div>
    <a href="/skripsi/update_admin" class="btn btn-secondary">Kembali</a>
    <h1>Ini Halaman Edit TA {{$joins->judul}}</h1>
</div>
<form action='{{ route('skripsi.update', $joins->id_skripsi) }}' method='post' enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' value="{{ $joins->name }}" id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='nim' value="{{ $joins->nim }}" id="nim">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bidang_id" class="col-sm-2 col-form-label">Nama Bidang</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='bidang_id' value="{{ $joins->bidang_id }}" id="bidang_id">
                    <option selected>.</option>
                    <option value="1">RPL</option>
                    <option value="2">Multimedia</option>
                    <option value="3">Jaringan</option>
                    <option value="4">Embedded</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='tahun' value="{{ $joins->tahun }}" id="tahun">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul KP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul' value="{{ $joins->judul }}" id="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="dosen_id" class="col-sm-2 col-form-label">Nama Dosen Pembimbing</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='dosen_id' value="{{ $joins->dosen_id }}" id="dosen_id">
                    <option selected>.</option>
                    <option value="1">Dania Eridani S.T., M.Eng</option>
                    <option value="2">Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE</option>
                    <option value="3">Eko Didik Widianto S.T., M.T.</option>
                    <option value="4">Rinta Kridalukmana, M.Kom., MT., PhD</option>
                    <option value="5">Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM</option>
                    <option value="6">Kurniawan Teguh Martono S.T., M.T.</option>
                    <option value="7">Risma Septiana S.T., M.Eng.</option>
                    <option value="8">Ike Pertiwi Windasari S.T., M.T.</option>
                    <option value="9">Adnan Fauzi S.T., M.Kom.</option>
                    <option value="10">Dr. Oky Dwi Nurhayati S.T., M.T.</option>
                    <option value="11">Agung Budi Prasetijo S.T., M.I.T., Ph.D.</option>
                    <option value="12">Patricia Evericho Mountaines, S.T., M.Cs.</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="dosen2_id" class="col-sm-2 col-form-label">Nama Dosen Pembimbing</label>
            <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name='dosen2_id' value="{{ $joins->dosen2_id }}" id="dosen2_id">
                    <option selected>.</option>
                    <option value="1">Dania Eridani S.T., M.Eng</option>
                    <option value="2">Dr. Adian Fatchur Rochim, S.T., M.T. SMIEEE</option>
                    <option value="3">Eko Didik Widianto S.T., M.T.</option>
                    <option value="4">Rinta Kridalukmana, M.Kom., MT., PhD</option>
                    <option value="5">Dr. Ir. R. Rizal Isnanto S.T., M.M., M.T., IPM</option>
                    <option value="6">Kurniawan Teguh Martono S.T., M.T.</option>
                    <option value="7">Risma Septiana S.T., M.Eng.</option>
                    <option value="8">Ike Pertiwi Windasari S.T., M.T.</option>
                    <option value="9">Adnan Fauzi S.T., M.Kom.</option>
                    <option value="10">Dr. Oky Dwi Nurhayati S.T., M.T.</option>
                    <option value="11">Agung Budi Prasetijo S.T., M.I.T., Ph.D.</option>
                    <option value="12">Patricia Evericho Mountaines, S.T., M.Cs.</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="abstrak" class="col-sm-2 col-form-label">Abstrak</label>
            <div class="col-sm-10">
                <input type="textarea" class="form-control" name='abstrak' value="{{ $joins->abstrak }}" id="abstrak">
            </div>
        </div>
        @if ($joins->file)
            <h5>Ada File</h5>
        @endif
        <div class="mb-3 row">
            <label for="file" class="col-sm-2 col-form-label">File</label>
            <div class="col-md-8">
                <input type="file" class="form-control" name="file" id="file">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection
