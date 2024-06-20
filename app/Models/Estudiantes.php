<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;
    protected $table = 'estudiantes';
    protected $primaryKey = 'idestudiante';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idestudiante',
        'idseccion',
        'idpersonal',
        'modalidad',
        'inscrito'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class, 'idpersonal','idpersonal');
    }
    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'idseccion', 'idseccion');
    }
}
