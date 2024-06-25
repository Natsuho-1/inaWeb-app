<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Horario
 * 
 * @property string $idhorario
 * @property string $idseccion
 * @property string $idturno
 * @property string $dia
 * @property Carbon|null $horainicio
 * @property Carbon|null $horafin
 * 
 * @property Turno $turno
 * @property Seccione $seccione
 *
 * @package App\Models
 */
class Horario extends Model
{
	protected $table = 'horarios';
	protected $primaryKey = 'idhorario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'horainicio' => 'datetime',
		'horafin' => 'datetime'
	];

	protected $fillable = [
		'idseccion',
		'idturno',
		'dia',
		'horainicio',
		'horafin'
	];

	public function turno()
	{
		return $this->belongsTo(Turno::class, 'idturno');
	}

	public function seccione()
	{
		return $this->belongsTo(Seccione::class, 'idseccion');
	}
}
