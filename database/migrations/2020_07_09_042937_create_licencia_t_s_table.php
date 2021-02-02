<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenciaTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licencia_t_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('emision');
            $table->date('vencimiento');
            $table->boolean('lentes');
            $table->boolean('audifonos');
            $table->string('cover_image');
            $table->boolean('estado')->default(false);
            $table->unsignedBigInteger('ci_persona');

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
        Schema::dropIfExists('licencia_t_s');
    }
}
