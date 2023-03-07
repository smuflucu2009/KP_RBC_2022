<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjambuku extends Model
{
    use HasFactory;
    protected $table = "pinjambuku";
    protected $fillable = ['nim', 'kode_gabungan_final', 'tanggal_peminjaman','tanggal_pengembalian','kadaluarsa'];

    public function getTanggalPeminjamanAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function buku()
    {   
        return $this->belongsTo(Buku::class, 'kode_gabungan_final')->withDefault([
            'status_pinjam' => 'tersedia', // nilai default saat buku belum dipinjam
        ]);
    }

    public function save(array $options = [])
    {
        // cek apakah buku sebelumnya sudah dipinjam atau belum
        $bukuLama = $this->getOriginal('kode_gabungan_final');
        if (!is_null($bukuLama)) {
            $bukuBaru = $this->kode_gabungan_final;
            if ($bukuLama != $bukuBaru) {
                // update status pinjam buku lama menjadi "tersedia"
                $bukuLama = Buku::find($bukuLama);
                if ($bukuLama) {
                    $bukuLama->update(['status_pinjam' => 'Tersedia']);
                }
            }
        }

        // update status pinjam buku baru menjadi "pinjam"
        $bukuBaru = Buku::where('kode_gabungan_final', $this->kode_gabungan_final);
        if ($bukuBaru) {
            $bukuBaru->update(['status_pinjam' => 'Pinjam']);
        }

        parent::save($options);
    }

    // Error Peminjaman dan error tulisan post walaupun bisa
    // public function delete()
    // {
    // // ambil data buku yang terkait dengan peminjaman
    // $buku = $this->buku;
    
    // // set status pinjam buku kembali ke "tersedia"
    // if ($buku) {
    //     $buku->update(['status_pinjam' => 'Tersedia']);
    // }

    // // hapus peminjaman
    // parent::delete();
    // }       
    
}
