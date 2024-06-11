<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{

    use HasFactory;
    protected $table = 'secciones';
    protected $primaryKey = 'idseccion';
    public $timestamps = false;

    protected $fillable = [
        'idseccion',
        'idgrado',
        'idespecialidad',
        'idaula',
        'seccion',
        'estado'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'idespecialidad', 'idespecialidad');
    }
    public function aula()
    {
        return $this->belongsTo(Aula::class, 'idaula', 'idaula');
    }
    public function grado()
    {
        return $this->belongsTo(Grado::class, 'idgrado','idgrado');
    }
}
