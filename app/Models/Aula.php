<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $table = 'aulas'; // Nombre correcto de la tabla
    protected $primaryKey = 'idaula';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'idaula',
        'nombre',
        'capacidad',
        'ubicacion'
    ];
    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'idaula', 'idaula');
    }
}
