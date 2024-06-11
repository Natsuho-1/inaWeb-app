<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;
    protected $table = 'Niveles';
    protected $primaryKey = 'idnivel';
    public $timestamps = false;

    protected $fillable = [
        'idnivel',
        'nombreNivel'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'idespecialidad', 'idespecialidad');
    }
    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'idseccion', 'idseccion');
    }
}
