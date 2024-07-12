<?php

// app/Models/Asignatura.php
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
                $lastIdNumber = $lastAsignatura ? intval(substr($lastAsignatura->idasignatura, 4)) : 0;
                $model->idasignatura = 'AS00' . ($lastIdNumber + 1);
            }
        });
    }
}