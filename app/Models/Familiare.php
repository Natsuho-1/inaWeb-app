<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Familiare
 * 
 * @property int $idfamiliar
 * @property string $idestudiante
 * @property string|null $nombresencargados
 * @property string|null $apellidosencargados
 * @property string $numtelefono
 * @property int|null $idpersonal
 * @property string|null $parentesco
 * @property string|null $lugartrabajo
 * @property string|null $telefonotrabajo
 * @property bool|null $responsable
 * 
 * @property Estudiante $estudiante
 * @property Persona|null $persona
 *
 * @package App\Models
 */
class Familiare extends Model
{
	protected $table = 'familiares';
	protected $primaryKey = 'idfamiliar';
	public $timestamps = false;

	protected $casts = [
		'idpersonal' => 'int',
		'responsable' => 'bool'
	];

	protected $fillable = [
		'idestudiante',
		'nombresencargados',
		'apellidosencargados',
		'numtelefono',
		'idpersonal',
		'parentesco',
		'lugartrabajo',
		'telefonotrabajo',
		'responsable'
	];

	public function estudiante()
	{
		return $this->belongsTo(Estudiante::class, 'idestudiante');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idpersonal');
	}
}
