<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property string $idarea
 * @property string $nombre
 * 
 * @property Collection|Edificio[] $edificios
 *
 * @package App\Models
 */
class Area extends Model
{
	protected $table = 'areas';
	protected $primaryKey = 'idarea';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function edificios()
	{
		return $this->hasMany(Edificio::class, 'idarea');
	}
}
