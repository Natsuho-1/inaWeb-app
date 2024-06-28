<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionAsignaturas extends Model
{
    use HasFactory;

    protected $table = 'historial_docentes_asignaturas';

    protected $fillable = [
        'iddocente', 'idasignatura', 'anio', 'estado'
    ];

    public $timestamps = false;

    public function docente()
    {
        return $this->belongsTo(Docente::class, 'iddocente');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasignatura');
    }
}


