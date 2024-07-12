<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PensumAsignatura
 * 
 * @property int $idpensumasignaturas
 * @property int $idpensum
 * @property string|null $idasignatura
 * @property int|null $anio
 * @property int|null $periodo
 * 
 * @property Pensum $pensum
 * @property Asignatura|null $asignatura
 *
 * @package App\Models
 */
class PensumAsignatura extends Model
{
	protected $table = 'pensum_asignaturas';
	protected $primaryKey = 'idpensumasignaturas';
	public $timestamps = false;

	protected $casts = [
		'idpensum' => 'int',
		'anio' => 'int',
		'periodo' => 'int'
	];

	protected $fillable = [
		'idpensum',
		'idasignatura',
		'anio',
		'periodo'
	];

	public function pensum()
	{
		return $this->belongsTo(Pensum::class, 'idpensum');
	}

	public function asignatura()
	{
		return $this->belongsTo(Asignatura::class, 'idasignatura');
	}
}
