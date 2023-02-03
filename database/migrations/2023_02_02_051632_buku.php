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
            // kode_gabungan_final -> id
            $table->id();
            $table->integer("tanggal_masuk");
            $table->string('judul_buku');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('isbn');
            $table->string('jenis_peminatan');
            $table->string('detail_jenis_peminatan');
            $table->string('kode_peminatan');
            $table->integer('kode_detail_jenis_peminatan');
            $table->integer('kode_tahun');
            $table->string('kode_nomor_urut_buku');
            $table->string('kode_gabungan_final')->unique();
            $table->tinyInteger('deleted_at')->default('0');
            $table->tinyInteger('status_pinjam')->default('0');
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
