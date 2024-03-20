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
            $table->string('telepon');
            $table->string('email');
            $table->date('validasi');
            $table->string('nomor_sertifikat');
            $table->date('tanggal_mulai_berlaku');
            $table->date('tanggal_habis_berlaku');
            $table->unsignedBigInteger('id_status');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
