<?php

// app/Models/Especialidad.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    protected $table = 'especialidades';

    protected $primaryKey = 'idespecialidad';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'descripcionspecialidad',
        'identificador',
        'modalidad'
    ];

    public $timestamps = false;  // Deshabilitar los timestamps

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastSpecialty = Especialidad::orderBy('idespecialidad', 'desc')->first();
            $lastIdNumber = $lastSpecialty ? intval(substr($lastSpecialty->idespecialidad, 4)) : 0;
            $model->idespecialidad = 'ES00' . ($lastIdNumber + 1);
        });
    }

    public function grados()
    {
        return $this->hasMany(Grado::class, 'idespecialidad', 'idespecialidad');
    }

    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'idespecialidad', 'idespecialidad');
    }
}

