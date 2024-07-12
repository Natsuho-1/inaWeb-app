<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notafinal
 * 
 * @property string $idnotafinal
 * @property string|null $idvoletanotas
 * @property string|null $idasignatura
 * @property string|null $promedio
 * @property string|null $notarecuperacion
 * @property string|null $notafinal
 * 
 * @property Voletanota|null $voletanota
 * @property Asignatura|null $asignatura
 *
 * @package App\Models
 */
class Notafinal extends Model
{
	protected $table = 'notafinal';
	protected $primaryKey = 'idnotafinal';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'idvoletanotas',
		'idasignatura',
		'promedio',
		'notarecuperacion',
		'notafinal'
	];

	public function voletanota()
	{
		return $this->belongsTo(Voletanota::class, 'idvoletanotas');
	}

	public function asignatura()
	{
		return $this->belongsTo(Asignatura::class, 'idasignatura');
	}
}
