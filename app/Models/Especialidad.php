<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';
    protected $primaryKey = 'idespecialidad';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idespecialidad',
        'idedificio',
        'nvl_especialidad',
        'modalidad'
    ];
    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'idespecialidad', 'idespecialidad');
    }
}
