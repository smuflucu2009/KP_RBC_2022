@extends('boostrap/dasar')
@section('isi_template')
<title> Edit KP: {{$joins->judul}}</title>
<div class="land">
    <div class="bg-2">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center"> Form Edit KERJA PRAKTIK </h1>
            </div>
            
        </div>
    </div>
</div>
<div class="panduan">
    <div class="faq-page">
        <div class="forms_page">
<form action='{{ route('kp.update', $joins->id_kp) }}' method='post' enctype="multipart/form-data">
    @csrf
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form" name='name' value="{{ $joins->name }}" id="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control form" name='nim' value="{{ $joins->nim }}" id="nim">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="bidang_id" class="col-sm-2 col-form-label">Nama Bidang</label>
            <div class="col-sm-10">
                <select class="form-select form" aria-label="Default select example" name='bidang_id' value="{{ $joins->bidang_id }}" id="bidang_id">
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
                <input type="number" class="form-control form" name='tahun' value="{{ $joins->tahun }}" id="tahun">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul" class="col-sm-2 col-form-label">Judul KP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form" name='judul' value="{{ $joins->judul }}" id="judul">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form" name='perusahaan' value="{{ $joins->perusahaan }}" id="perusahaan">
            </div>
        </div> 
        <div class="mb-3 row">
            <label for="lokasi_perusahaan" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form" name='lokasi_perusahaan' value="{{ $joins->lokasi_perusahaan }}" id="lokasi_perusahaan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="dosen_id" class="col-sm-2 col-form-label">Nama Dosen Pembimbing</label>
            <div class="col-sm-10">
                <select class="form-select form" aria-label="Default select example" name='dosen_id' value="{{ $joins->dosen_id }}" id="dosen_id">
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
                <input type="textarea" class="form-control form" name='abstrak' value="{{ $joins->abstrak }}" id="abstrak">
            </div>
        </div>
        @if ($joins->file)
            <h5>Ada File</h5>
        @endif
        <div class="mb-3 row">
            <label for="file" class="col-sm-2 col-form-label">File</label>
            <div class="col-md-8">
                <input type="file" class="form-control form" name="file" id="file" value="{{ $joins->file }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="submit" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary form_submit" name="submit">SIMPAN</button>
            </div>
        </div>
</form>
    </div></div></div>
@endsection
