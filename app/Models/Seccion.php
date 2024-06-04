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
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idseccion',
        'idespecialidad',
        'idaula',
        'seccion'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'idespecialidad', 'idespecialidad');
    }

    public function aula()
    {
        return $this->belongsTo(Aula::class, 'idaula', 'idaula');
    }
    public function especialidades($id)
    {
        return Especialidad::select('especialidades.*')
            ->join('secciones', 'especialidades.idespecialidad', '=', 'secciones.idespecialidad')
            ->where('secciones.idseccion', $id)
            ->get();
    }

    public function aulas($id)
    {
        return Aula::select('aulas.*')
            ->join('secciones', 'aulas.idaula', '=', 'secciones.idaula')
            ->where('secciones.idseccion', $id)
            ->get();
    }
}
