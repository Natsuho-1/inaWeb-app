<?php

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
        'idespecialidad',
        'descripcionspecialidad',
        'modalidad',
        'nombrenivel'
    ];

    public $timestamps = false;  // Deshabilitar los timestamps
}





