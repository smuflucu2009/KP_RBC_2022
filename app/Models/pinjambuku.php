<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\buku;

class Pinjambuku extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pinjam';

    protected $table = 'pinjambuku';
    protected $fillable = ['nim', 'kode_gabungan_final', 'tanggal_peminjaman', 'tanggal_pengembalian', 'kadaluarsa', 'status'];

    public function getTanggalPeminjamanAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function buku()
    {
        return $this->belongsTo(buku::class, 'kode_gabungan_final')->withDefault([
            'status_pinjam' => 'Tersedia', // nilai default saat buku belum dipinjam
        ]);
    }

    public function save(array $options = [])
    {
        $originalBuku = $this->getOriginal('kode_gabungan_final');
        $updatedBuku = $this->getAttribute('kode_gabungan_final');

        if (!is_null($originalBuku) && $originalBuku !== $updatedBuku) {
            // Update status pinjam buku lama menjadi "Tersedia"
            buku::where('kode_gabungan_final', $originalBuku)
                ->update(['status_pinjam' => 'Tersedia']);
        }

        // Update status pinjam buku baru menjadi "Pinjam"
        buku::where('kode_gabungan_final', $updatedBuku)
            ->update(['status_pinjam' => 'Menunggu']);

        parent::save($options);
    }

    public function delete(array $options = [])
    {
    // get the original buku
    $originalBuku = $this->getOriginal('kode_gabungan_final');
    
    // Update status pinjam buku menjadi "Tersedia"
    buku::where('kode_gabungan_final', $originalBuku)->update(['status_pinjam' => 'Tersedia']);
    
    return parent::delete($options);
    }
}
