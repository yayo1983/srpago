<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDMnpiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_mnpios', function (Blueprint $table) {
            $table->id();
            $table->string('d_mnpio');
            $table->string('c_mnpio');
            $table->bigInteger('d_estados_id')->unsigned();
            $table->foreign('d_estados_id')->references('id')->on('d_estados');
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
        Schema::dropIfExists('d_mnpios');
    }
}
