<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('ci');
            $table->char('nombres', 30);
            $table->char('apellidos', 30);
            $table->char('sexo', 1);
            $table->char('nacionalidad', 30);
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->char('grupo_sanguineo', 10);
            $table->string('email')->unique();
            $table->char('codigo_oficial', 20)->nullable();
            $table->boolean('estado_ciudadano')->nullable();
            $table->boolean('estado_oficial')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
}
