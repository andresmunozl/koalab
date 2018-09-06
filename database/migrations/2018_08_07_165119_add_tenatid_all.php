<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTenatidAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academic_years', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('asistencia', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('docents', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('docent_subjects', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('estudiantes', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('groups', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('materias', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('materia_years', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('matriculas', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('ofertas', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('oferta_materias', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('programacions', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->string('tenantid')->nullable();
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
