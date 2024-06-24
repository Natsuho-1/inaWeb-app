<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idusuario';
    public $incrementing = false;
    public $timestamps = false;

    // Especificar los campos que se pueden rellenar masivamente
    protected $fillable = [
        'idusuario',
        'idrol',
        'correo_usuario',
        'contraseña'
    ];
    public function Rol()
    {
        return $this->belongsTo(Rol::class, 'idrol');
    }
    public function persona()
    {
        return $this->hasOne(Persona::class, 'idusuario', 'idusuario');
    }
}