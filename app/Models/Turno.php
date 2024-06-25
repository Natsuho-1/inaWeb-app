<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Turno
 * 
 * @property string $idturno
 * @property string $turno
 * 
 * @property Collection|Horario[] $horarios
 *
 * @package App\Models
 */
class Turno extends Model
{
	protected $table = 'turnos';
	protected $primaryKey = 'idturno';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'turno'
	];

	public function horarios()
	{
		return $this->hasMany(Horario::class, 'idturno');
	}
}
