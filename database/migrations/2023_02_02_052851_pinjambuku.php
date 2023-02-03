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
            $table->id();
            $table->foreignId('kode_gabungan_final')->references('id')->on('buku')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');            
            $table->date('akhir_pinjam');
            $table->date('awal_pinjam')->default(DB::raw('CURRENT_TIMESTAMP'));
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
