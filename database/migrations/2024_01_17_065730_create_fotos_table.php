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
            $table->id('FotoID');
            $table->string('JudulFoto', 255);
            $table->text('DeskripsiFoto');
            $table->date('TanggalUnggah');
            $table->string('LokasiFile', 255);
            $table->integer('AlbumID')->nullable();
            $table->integer('UserID')->nullable();
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
