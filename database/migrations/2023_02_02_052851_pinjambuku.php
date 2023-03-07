<?php

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
            $table->foreignId('nim')->references('nim')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->date('akhir_pinjam');
            $table->date('awal_pinjam')->default(date("Y-m-d H:i:s"));
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
