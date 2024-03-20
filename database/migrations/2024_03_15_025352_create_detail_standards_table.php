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
        Schema::create('detail_standards', function (Blueprint $table) {
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_standard');
        });

        Schema::table('detail_standards', function (Blueprint $table){
            $table->foreign('id_client')->references('id')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_standard')->references('id')->on('standards')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_standards');
    }
};
