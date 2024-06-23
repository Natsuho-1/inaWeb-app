<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;

    protected $primaryKey = 'iddocente';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'iddocente', 'nombre', 'edad', 'fecha_nacimiento', 'sexo', 'estado_civil', 'direccion', 'telefono_fijo', 'celular', 'celular_clase', 
        'dui', 'nit', 'nip', 'nivel', 'categoria', 'especialidad', 'fecha_graduacion', 'inpep', 'isss', 'afp', 'nup', 
        'nacionalidad', 'pasaporte', 'otros_cargos', 'lugar', 'otra_institucion', 'telefono_otrainstitucion', 'turno', 'idseccion', 'idpersonal'
    ];

    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'idseccion');
    }


}
