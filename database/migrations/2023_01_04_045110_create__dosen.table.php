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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dosen');
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
        Schema::dropIfExists('dosen');
    }
};

// Schema::create('kp', function (Blueprint $table) {
//     $table->id()->autoIncrement();
//     $table->string('name');
//     $table->string('nim');
//     $table->foreign('bidang_id')->references('id')->on('bidang')->onDelete('cascade')->onUpdate('cascade');
//     $table->integer('tahun');
//     $table->string('judul');
//     $table->string('koleksi');
//     $table->bigInteger('dosen_id')->references('id')->on('dosen')->onDelete('cascade')->onUpdate('cascade');
//     $table->bigInteger('dosen2_id')->references('id')->on('dosen')->onDelete('cascade')->onUpdate('cascade');
//     $table->longText('abstrak');
//     $table->string('file');
//     $table->timestamps();
// });
