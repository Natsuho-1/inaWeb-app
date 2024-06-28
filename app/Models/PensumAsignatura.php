<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PensumAsignatura
 * 
 * @property int $idpensum
 * @property int $idasignatura
 * @property int|null $anio
 * @property int|null $periodo
 * 
 * @property Pensum $pensum
 * @property Asignatura $asignatura
 *
 * @package App\Models
 */
class PensumAsignatura extends Model
{
    protected $table = 'pensum_asignaturas';
    public $incrementing = false; // Deshabilita la auto-incrementación
    public $timestamps = false;

    protected $primaryKey = ['idpensum', 'idasignatura']; // Clave primaria compuesta

    protected $fillable = ['idpensum', 'idasignatura', 'anio', 'periodo']; // Asegúrate de tener los campos adecuados aquí

    public function pensum()
    {
        return $this->belongsTo(Pensum::class, 'idpensum');
    }

    public function asignatura()
    {
        return $this->belongsTo(Asignatura::class, 'idasignatura');
    }
}
