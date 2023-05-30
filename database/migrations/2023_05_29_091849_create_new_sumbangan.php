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
            $table->bigInteger('nim');
            $table->foreign('nim')->references('nim')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('angkatan');
            $table->string('keperluan');
            $table->timestamp('waktu_post')->useCurrent();
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
