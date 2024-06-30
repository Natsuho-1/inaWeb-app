<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Voletanota
 * 
 * @property string $idvoletanotas
 * @property string $idestudiante
 * @property Carbon|null $anio
 * 
 * @property Estudiante $estudiante
 * @property Collection|Notafinal[] $notafinals
 *
 * @package App\Models
 */
class Voletanota extends Model
{
	protected $table = 'voletanotas';
	protected $primaryKey = 'idvoletanotas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'anio' => 'datetime'
	];

	protected $fillable = [
		'idestudiante',
		'anio'
	];

	public function estudiante()
	{
		return $this->belongsTo(Estudiante::class, 'idestudiante');
	}

	public function notafinals()
	{
		return $this->hasMany(Notafinal::class, 'idvoletanotas');
	}
}
