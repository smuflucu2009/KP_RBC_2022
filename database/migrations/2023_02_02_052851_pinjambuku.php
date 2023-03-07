<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('pinjambuku', function (Blueprint $table) {
            $table->bigIncrements('id_pinjam');
            $table->string('kode_gabungan_final');
            $table->foreign('kode_gabungan_final')->references('kode_gabungan_final')->on('buku')->onDelete('cascade')->onUpdate('cascade');
            // $table->bigInteger('nim');
            $table->foreignId('nim')->references('nim')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('tanggal_peminjaman')->useCurrent();
            $table->timestamp('tanggal_pengembalian')->nullable();
            $table->string('kadaluarsa')->nullable();
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
        Schema::dropIfExists('pinjambuku');
    }
};
