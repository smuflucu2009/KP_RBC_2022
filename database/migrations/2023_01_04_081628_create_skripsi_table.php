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
        Schema::create('skripsi', function (Blueprint $table) {
            $table->bigIncrements('id_skripsi');
            $table->string('name');
            $table->string('nim');
            //$table->bigInteger('bidang_id');
            $table->foreignId('bidang_id')->references('id')->on('bidang')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('tahun');
            $table->string('judul');
            // $table->bigInteger('dosen_id');
            // $table->bigInteger('dosen2_id');
            $table->foreignId('dosen_id')->references('id')->on('dosen')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('dosen2_id')->references('id')->on('dosen')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('abstrak');
            $table->string('file');
            $table->tinyInteger('deleted_at')->default('0');
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
        Schema::dropIfExists('skripsi');
    }
};
