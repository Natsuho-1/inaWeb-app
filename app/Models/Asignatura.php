<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asignatura
 * 
 * @property int $idasignatura
 * @property string|null $asignatura
 * @property string|null $tipo
 * 
 * @property Collection|Pensum[] $pensums
 *
 * @package App\Models
 */
class Asignatura extends Model
{
	protected $table = 'asignaturas';
	protected $primaryKey = 'idasignatura';
	public $timestamps = false;

	protected $fillable = [
		'asignatura',
		'tipo'
	];

	public function pensums()
	{
		return $this->belongsToMany(Pensum::class, 'pensum_asignaturas', 'idasignatura', 'idpensum')
					->withPivot('anio', 'periodo');
	}
}
