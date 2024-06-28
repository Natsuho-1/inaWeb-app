<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $table = 'docentes';
    protected $primaryKey = 'iddocente';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'iddocente', 'nit', 'nip', 'nivel', 'categoria', 'especialidad',
        'fecha_graduacion', 'inpep', 'isss', 'afp', 'nup', 'pasaporte', 'otros_cargos',
        'lugar', 'otra_institucion', 'telefono_otrainstitucion', 'turno', 'idseccion', 'idpersonal'
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'idseccion');
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idpersonal');
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidad', 'idespecialidad');
    }
}
