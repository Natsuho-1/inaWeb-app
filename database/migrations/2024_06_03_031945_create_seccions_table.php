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
            $table->char('idgrado', 6);
            $table->char('idespecialidad', 6);
            $table->string('idaula', 6)->default('AU0001')->change();
            $table->char('idgrupos', 6);
            $table->string('estado', 2);
            $table->foreign('idgrado')->references('idgrado')->on('grado')->onUpdate('cascade');
            $table->foreign('idespecialidad')->references('idespecialidad')->on('especialidades')->onUpdate('cascade');
            $table->foreign('idgrupos')->references('idgrupos')->on('grupos')->onUpdate('cascade');
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
