<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaneadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planeadors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_dane')->nullable();
            $table->integer('docente_id')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('horas')->nullable();
            $table->integer('sesiones')->nullable();
            $table->integer('colegio_id')->nullable();
            $table->integer('materia_id')->nullable();
            $table->string('tenantid')->nullable();
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
        Schema::dropIfExists('planeadors');
    }
}
