@extends('boostrap/dasar')
@section('isi_template')
<title>Halaman Detail {{$data->judul_buku}}</title>
<div>
    <a href="/buku" class="btn btn-secondary">Kembali</a>
    <h1>Judul: {{ $data->judul_buku }}</h1>
    <h3>Tanggal Masuk: {{ $data->tanggal_masuk }}</h3>
    <div>
        <b>Kode Buku: </b>{{ $data->kode_gabungan_final }}
    </div>
    <div>
        <b>Penulis: </b>{{ $data->penulis }}
    </div>
    <div>
        <b>Penerbit: </b>{{ $data->penerbit }}
    </div>
    <div>
        <b>ISBN: </b>{{ $data->isbn }}
    </div>
    <div>
        <b>Jenis Peminatan: </b>{{ $data->jenis_peminatan }}
    </div>
    <div>
        <b>Detail Jenis Peminatan: </b>{{ $data->detail_jenis_peminatan }}
    </div>
    <div>
        <b>Kode Peminatan: </b>{{ $data->kode_peminatan }}
    </div>
    <div>
        <b>Kode Detail Jenis Peminatan: </b>{{ $data->kode_detail_jenis_peminatan }}
    </div>
    <div>
        <b>Kode Tahun: </b>{{ $data->kode_tahun }}
    </div>
    <div>
        <b>Kode Nomor Urut Buku: </b>{{ $data->kode_nomor_urut_buku }}
    </div>
    
</div>
<div>
    <b>status pinjam: </b>{{ $data->status_pinjam }}
</div>
@if ($data->status_pinjam == 'Terpinjam' || $data->status_pinjam == 'Pending')
    <h3>Buku Sedang Dipinjam atau Masa Pending</h3>
@else
<form action='{{ route('pinjamb.store') }}' method='post'>
    @csrf
    <input type="hidden" name="kode_gabungan_final" value="{{ $data->kode_gabungan_final }}">
    {{-- <div class="mb-3 row">
        <label for="no" class="col-sm-2 col-form-label">NIM</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name='nim' value="{{ Session::get('nim')}}" id="nim">
        </div>
    </div> --}}
    <div>
        <label for="tanggal_pengembalian">Waktu Pengembalian:</label>
        <select name="tanggal_pengembalian" id="tanggal_pengembalian">
            <option value="A">Satu Minggu</option>
            <option value="B">Dua Minggu</option>
        </select>
    </div>
    <div class="mb-3 row">
        <label for="submit" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Pinjam</button>
        </div>
    </div>        
</form>
@endif


@endsection