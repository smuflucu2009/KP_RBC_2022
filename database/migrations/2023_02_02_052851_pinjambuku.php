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
        Schema::create('pinjambuku', function (Blueprint $table) {
            $table->integer('id_pinjam', 50)->primary();
            $table->foreignId('kode_gabungan_final')->references('kode_gabungan_final')->on('buku')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_user')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
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
