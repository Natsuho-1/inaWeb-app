<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('especialidades')) {
            Schema::create('especialidades', function (Blueprint $table) {
                $table->char('idespecialidad', 6)->primary();
                $table->string('descripcionspecialidad', 25);
                $table->string('modalidad', 15);
                $table->string('nombrenivel', 50);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('especialidades');
    }
}


