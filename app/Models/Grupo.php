<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupos';
    protected $primaryKey = 'idgrupo';
    public $timestamps = false;

    protected $fillable = [
        'idgrupo',
        'nombreGrupo'
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
