<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    protected $primaryKey = 'idgrado';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idgrado', 'descripciongrado', 'idespecialidad'
    ];

    // Relación con Especialidad
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'idespecialidad', 'idespecialidad');
    }

    // Relación con Secciones (Many-to-Many)
    public function secciones()
    {
        return $this->belongsToMany(Seccion::class, 'seccion_grado', 'idgrado', 'idseccion');
    }
}