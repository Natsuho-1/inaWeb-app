<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'idpersonal';
    public $timestamps = false;

    // Especificar los campos que se pueden rellenar masivamente
    protected $fillable = [
        'idusuario',
        'nombres',
        'apellidos',
        'fechanacimiento',
        'identificacion',
        'telefonofijo',
        'telefonomovil',
        'otrotelefono',
        'genero',
        'correoinstitucional',
        'direccion',
        'nacionalidad',
        'departamento',
        'municipio',
        'distrito',
        'estadocivil'
    ];
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idusuario', 'idusuario');
    }
    public function estudiante()
    {
        return $this->hasOne(Estudiantes::class, 'idpersonal','idpersonal');
    }
}