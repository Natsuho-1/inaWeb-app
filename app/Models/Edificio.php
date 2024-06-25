<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Edificio
 * 
 * @property string $idedificio
 * @property string $idarea
 * @property string $nombre
 * @property int $niveles
 * @property string|null $ubicacion
 * 
 * @property Area $area
 * @property Collection|Aula[] $aulas
 *
 * @package App\Models
 */
class Edificio extends Model
{
	protected $table = 'edificios';
	protected $primaryKey = 'idedificio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'niveles' => 'int'
	];

	protected $fillable = [
		'idarea',
		'nombre',
		'niveles',
		'ubicacion'
	];

	public function area()
	{
		return $this->belongsTo(Area::class, 'idarea');
	}

	public function aulas()
	{
		return $this->hasMany(Aula::class, 'idedificio');
	}
}
