<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    protected $primaryKey = 'idasignatura';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idasignatura', 'asignatura', 'tipo'
    ];

    public $timestamps = false; // Desactivar timestamps

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->idasignatura)) {
                $lastAsignatura = Asignatura::orderBy('idasignatura', 'desc')->first();
                $lastIdNumber = $lastAsignatura ? intval(substr($lastAsignatura->idasignatura, 2)) : 0; // Cambiado 4 a 2 para obtener el número después de 'AS'
                $newIdNumber = $lastIdNumber + 1;
                $model->idasignatura = 'AS' . str_pad($newIdNumber, 4, '0', STR_PAD_LEFT);
            }
        });
    }

}


