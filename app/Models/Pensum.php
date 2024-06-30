<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pensum
 * 
 * @property int $idpensum
 * @property string|null $idespecialidad
 * @property string|null $nombrepensum
 * @property Carbon|null $promocion
 * @property int|null $duracion
 * @property int|null $periodos
 * 
 * @property Especialidade|null $especialidade
 * @property Collection|Asignatura[] $asignaturas
 *
 * @package App\Models
 */
class Pensum extends Model
{
	protected $table = 'pensum';
	protected $primaryKey = 'idpensum';
	public $timestamps = false;

	protected $casts = [
		'promocion' => 'datetime',
		'duracion' => 'int',
		'periodos' => 'int'
	];

	protected $fillable = [
		'idespecialidad',
		'nombrepensum',
		'promocion',
		'duracion',
		'periodos'
	];

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'idespecialidad');
	}

	public function asignaturas()
	{
		return $this->belongsToMany(Asignatura::class, 'pensum_asignaturas', 'idpensum', 'idasignatura')
					->withPivot('idpensumasignaturas', 'anio', 'periodo');
	}
}
