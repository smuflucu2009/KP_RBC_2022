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
        Schema::create('postingan', function (Blueprint $table) {
            $table->string('id_postingan', 20);
            $table->string('judul');
            $table->longText('deskripsi');
            $table->foreignId('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cover_gambar');
            $table->tinyInteger('deleted_at', 1)->default(0);
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
        Schema::dropIfExists('postingan');
    }
};
