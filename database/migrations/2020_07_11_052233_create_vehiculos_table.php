<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->char('placa', 10)->primary();
            $table->char('marca', 30);
            $table->char('nombre', 20);
            $table->integer('modelo');
            $table->char('nrochasis', 20);
            $table->char('nromotor', 20);
            $table->boolean('estado')->default(false);
            $table->string('cover_image');
            $table->unsignedTinyInteger('id_color');
            $table->unsignedTinyInteger('id_tipovehiculo');
            $table->unsignedBigInteger('ci_persona');
            $table->timestamps();
            
            $table->foreign('id_color')->references('id')->on('colors');
            $table->foreign('id_tipovehiculo')->references('id')->on('tipo_vehiculos');
            $table->foreign('ci_persona')->references('ci')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehiculos');
    }
}
