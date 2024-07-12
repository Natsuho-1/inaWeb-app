<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->char('iddocente', 8)->primary();
            $table->string('nombre', 100);
            $table->integer('edad');
            $table->date('fecha_nacimiento');
            $table->char('sexo', 1);
            $table->string('estado_civil', 50);
            $table->text('direccion');
            $table->string('telefono_fijo', 15)->nullable();
            $table->string('celular', 15);
            $table->string('celular_clase', 15)->nullable();
            $table->string('dui', 10);
            $table->string('nit', 17);
            $table->string('nip', 15)->nullable();
            $table->string('nivel', 50);
            $table->string('categoria', 50);
            $table->string('especialidad', 100);
            $table->date('fecha_graduacion');
            $table->string('inpep', 50)->nullable();
            $table->string('isss', 50)->nullable();
            $table->string('afp', 50)->nullable();
            $table->string('nup', 50)->nullable();
            $table->string('nacionalidad', 50);
            $table->string('pasaporte', 50)->nullable();
            $table->text('otros_cargos')->nullable();
            $table->string('lugar', 100)->nullable();
            $table->string('otra_institucion', 100)->nullable();
            $table->string('telefono_otrainstitucion', 15)->nullable();
            $table->string('turno', 50)->nullable();
            $table->char('idseccion', 6)->nullable();
            $table->integer('idpersonal');
            $table->foreign('idseccion')->references('idseccion')->on('secciones')->onUpdate('cascade');
            $table->foreign('idpersonal')->references('idpersonal')->on('persona')->onUpdate('cascade');
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
        Schema::dropIfExists('docentes');
    }
}

