<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    protected $table = 'grado';
    protected $primaryKey = 'idgrado';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'idgrado', 'descripciongrado', 'idnivel'
    ];
    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'idnivel', 'idnivel');
    }
    public $timestamps = false;  // Deshabilitar los timestamps
}