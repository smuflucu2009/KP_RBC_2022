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
            // $table->id()->primary();
            $table->integer("tanggal_masuk")->nullable();
            $table->string('judul_buku')->nullable();
            $table->string('penulis')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('isbn')->nullable();
            $table->string('jenis_peminatan')->nullable();
            $table->string('detail_jenis_peminatan')->nullable();
            $table->string('kode_peminatan')->nullable();
            $table->integer('kode_detail_jenis_peminatan')->nullable();
            $table->integer('kode_tahun')->nullable();
            $table->string('kode_nomor_urut_buku')->nullable();
            $table->string('kode_gabungan_final')->primary();
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
