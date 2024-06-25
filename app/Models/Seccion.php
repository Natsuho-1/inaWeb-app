<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{

    use HasFactory;
    protected $table = 'secciones';
    protected $primaryKey = 'idseccion';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idseccion',
        'idgrado',
        'idespecialidad',
        'idaula',
        'idgrupos',
        'idnivel',
        'estado',
        'cantidad'
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
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'idgrupos','idgrupos');
    }
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'idnivel','idnivel');
    }
}
