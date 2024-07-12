<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class HistorialDocentesAsignatura
 * 
 * @property int $id_historial
 * @property string $iddocente
 * @property string $idasignatura
 * @property Carbon $anio
 * @property string $estado
 * 
 * @property Docente $docente
 * @property Asignatura $asignatura
 *
 * @package App\Models
 */
class HistorialDocentesAsignatura extends Model
{
	protected $table = 'historial_docentes_asignaturas';
	protected $primaryKey = 'id_historial';
	public $timestamps = false;

	protected $casts = [
		'anio' => 'datetime'
	];

	protected $fillable = [
		'iddocente',
		'idasignatura',
		'anio',
		'estado'
	];

	public function docente()
	{
		return $this->belongsTo(Docente::class, 'iddocente');
	}

	public function asignatura()
	{
		return $this->belongsTo(Asignatura::class, 'idasignatura');
	}
}
