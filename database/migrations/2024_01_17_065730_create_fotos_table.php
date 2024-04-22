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
        Schema::create('fotos', function (Blueprint $table) {
            $table->id('id');
            $table->string('judul_foto', 255);
            $table->text('deskripsi_foto');
            $table->date('tanggal_unggah');
            $table->string('lokasi_file', 255);
            $table->integer('albums_id')->nullable();
            $table->integer('users_id')->nullable();
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
        Schema::dropIfExists('fotos');
    }
};
