<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciaASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencia_a_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('emision');
            $table->date('vencimiento');
            $table->boolean('lentes');
            $table->boolean('audifonos');
            $table->string('cover_image');
            $table->boolean('estado')->default(false);
            $table->unsignedBigInteger('ci_persona');
            $table->char('categoria_licencia', 1);

            $table->foreign('ci_persona')->references('ci')->on('personas');
            $table->foreign('categoria_licencia')->references('categoria')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licencia_a_s');
    }
}
