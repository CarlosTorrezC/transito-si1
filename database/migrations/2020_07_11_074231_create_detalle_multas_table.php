<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleMultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_multas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_multa');
            $table->unsignedBigInteger('id_infraccion');

            $table->foreign('id_multa')->references('id')->on('multas');
            $table->foreign('id_infraccion')->references('id')->on('infraccions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_multas');
    }
}
