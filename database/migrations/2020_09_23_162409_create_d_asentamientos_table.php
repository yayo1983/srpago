<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDAsentamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_asentamientos', function (Blueprint $table) {
            $table->id();
            $table->integer('d_codigo');
            $table->string('d_asenta');
            $table->string('id_asenta_cpcons');
            $table->bigInteger('id_ciudad')->unsigned();
            $table->bigInteger('id_tipo_asentamiento')->unsigned();
            $table->bigInteger('id_zona')->unsigned();
            $table->bigInteger('id_admin_postal')->unsigned();
            $table->foreign('id_ciudad')->references('id')->on('d_ciudads');
            $table->foreign('id_tipo_asentamiento')->references('id')->on('d_tipo_asentas');
            $table->foreign('id_zona')->references('id')->on('d_zonas');
            $table->foreign('id_admin_postal')->references('id')->on('d_admin_postals');
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
        Schema::dropIfExists('d_asentamientos');
    }
}
