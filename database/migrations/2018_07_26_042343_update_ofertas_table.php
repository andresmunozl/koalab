<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ofertas', function (Blueprint $table) {

            $table->integer('colegio_id')->nullable();
            $table->integer('academicyear_id')->nullable();
            $table->boolean('state')->nullable();
            $table->string('description')->nullable()->change();
            $table->string('calendar')->nullable()->change();
            $table->integer('group')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
