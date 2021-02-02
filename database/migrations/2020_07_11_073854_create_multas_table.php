<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->string('nombre_infractor');
            $table->string('nrolicencia_infractor');
            $table->string('tipo_licencia');
            $table->boolean('estado')->default(false);
            $table->dateTime('fecha_hora');
            $table->char('codigo_oficial', 20);
            $table->char('placa_vehiculo');
            $table->boolean('sended_email')->default(true);
            $table->boolean('sended_sms')->default(true);

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
        Schema::dropIfExists('multas');
    }
}
