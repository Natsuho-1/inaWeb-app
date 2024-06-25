<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familiares extends Model
{
    use HasFactory;
    protected $table = 'familiares';
    protected $primaryKey = 'idfamiliar';
    public $timestamps = false;

    protected $fillable = [
        'idestudiante',
        'nombresencargados',
        'apellidosencargados',
        'numtelefono',
        'idpersonal',
        'parentesco',
        'lugartrabajo',
        'telefonotrabajo',
        'responsable'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idpersonal','idpersonal');
    }
    public function estudiantes()
    {
        return $this->belongsTo(Estudiantes::class, 'idestudiante', 'idestudiante');
    }
}
