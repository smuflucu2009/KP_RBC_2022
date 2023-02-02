<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->string("kode_gabungan_final", 11)->primary();
            $table->integer("tanggal_masuk", 4);
            $table->string('judul_buku', 69);
            $table->string('penulis', 31);
            $table->string('penerbit', 25);
            $table->string('isbn', 17);
            $table->string('jenis_peminatan', 34);
            $table->string('detail_jenis_peminatan', 18);
            $table->string('kode_peminatan', 1);
            $table->integer('kode_detail_jenis_peminatan',2);
            $table->integer('kode_tahun', 2);
            $table->string('kode_nomer_urut_buku', 3);
            $table->tinyInteger('status_pinjam', 1);
            $table->tinyInteger('deleted_at', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
