<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitacorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_hora');
            $table->string('modulo');
            $table->string('codigo_documento')->nullable();
            $table->char('ip', 15);
            $table->text('datos_antiguos')->nullable();
            $table->text('datos_nuevos')->nullable();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedInteger('id_operacion');

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_operacion')->references('id')->on('operacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
}
