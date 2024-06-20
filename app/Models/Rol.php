<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'idrol';
    public $incrementing = false;
    public $timestamps = false;

    // Especificar los campos que se pueden rellenar masivamente
    protected $fillable = [
        'rol'
    ];
}