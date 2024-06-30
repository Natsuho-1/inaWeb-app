<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
    protected $table = 'grupos';
    protected $primaryKey = 'idgrupos';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'idgrupos',
        'descripciongrupo',
        'estado'
    ];
    public function secciones()
    {
        return $this->hasMany(Seccion::class, 'idgrupos');
    }
}