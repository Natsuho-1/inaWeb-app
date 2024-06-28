<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePensumAsignaturasTable extends Migration
{
    public function up()
    {
        Schema::create('pensum_asignaturas', function (Blueprint $table) {
            $table->integer('idpensum')->unsigned();
            $table->integer('idasignatura')->unsigned();
            $table->integer('anio')->nullable();
            $table->integer('periodo')->nullable();

            // Definir claves foráneas
            $table->foreign('idpensum')->references('idpensum')->on('pensums')->onDelete('cascade');
            $table->foreign('idasignatura')->references('idasignatura')->on('asignaturas')->onDelete('cascade');
            
            // Clave primaria compuesta
            $table->primary(['idpensum', 'idasignatura']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('pensum_asignaturas');
    }
}