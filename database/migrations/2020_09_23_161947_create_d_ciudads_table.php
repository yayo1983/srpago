<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDCiudadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_ciudads', function (Blueprint $table) {
            $table->id();
            $table->string('d_ciudad')->nullable();
            $table->string('c_cve_ciudad')->nullable();
            $table->bigInteger('d_mnpios_id')->unsigned();
            $table->foreign('d_mnpios_id')->references('id')->on('d_mnpios');
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
        Schema::dropIfExists('d_ciudads');
    }
}
