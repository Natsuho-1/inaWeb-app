<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('secciones', function (Blueprint $table) {
            $table->char('idseccion', 6)->primary();
            $table->char('idespecialidad', 6);
            $table->char('idaula', 6);
            $table->string('seccion', 50);
            $table->foreign('idespecialidad')->references('idespecialidad')->on('especialidades')->onUpdate('cascade');
            $table->foreign('idaula')->references('idaula')->on('aulas')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccions');
    }
};
