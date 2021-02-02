<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('empresa', 30);
            $table->date('emision');
            $table->date('vencimiento');
            $table->boolean('estado')->default(false);
            $table->char('placa_vehiculo');

            $table->foreign('placa_vehiculo')->references('placa')->on('vehiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seguros');
    }
}
