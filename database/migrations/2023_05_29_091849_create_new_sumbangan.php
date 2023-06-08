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
        Schema::create('sumbangan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nama2')->default('-')->nullable();
            $table->string('nama3')->default('-')->nullable();
            $table->string('nama4')->default('-')->nullable();
            $table->string('nama5')->default('-')->nullable();
            $table->string('nama6')->default('-')->nullable();
            $table->string('nama7')->default('-')->nullable();
            $table->string('angkatan_wisuda');
            $table->string('judul_buku');
            $table->integer('tahun_terbit');
            $table->string('penulis');
            $table->string('harga');
            $table->timestamp('waktu_sumbang')->useCurrent();
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
        Schema::dropIfExists('sumbangan');
    }
};
