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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('kontak');
            $table->unsignedBigInteger('id_standar');
            $table->date('validasi');
            $table->string('nomor_sertifikat');
            $table->date('tanggal_mulai_berlaku');
            $table->date('tanggal_habis_berlaku');
            $table->string('status');
            $table->unsignedBigInteger('id_ruang_lingkup');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::table('clients', function (Blueprint $table){
            $table->foreign('id_standar')->references('id')->on('standards')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ruang_lingkup')->references('id')->on('ruang_lingkups')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
