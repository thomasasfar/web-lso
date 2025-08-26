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
        Schema::create('detail_ruang_lingkups', function (Blueprint $table) {
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_ruang_lingkup');
        });

        Schema::table('detail_ruang_lingkups', function (Blueprint $table){
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ruang_lingkup')->references('id')->on('ruang_lingkups')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_ruang_lingkups');
    }
};
