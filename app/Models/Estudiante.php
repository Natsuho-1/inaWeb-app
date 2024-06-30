<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estudiante
 * 
 * @property string $idestudiante
 * @property string|null $idseccion
 * @property int|null $idpersonal
 * @property string|null $idgrado
 * @property string $idespecialidad
 * @property string|null $carnetmenoridad
 * @property string $modalidad
 * @property string|null $estadoestudiante
 * @property string|null $inscrito
 * 
 * @property Especialidade $especialidade
 * @property Grado|null $grado
 * @property Seccione|null $seccione
 * @property Persona|null $persona
 * @property Collection|Familiare[] $familiares
 * @property Collection|Voletanota[] $voletanotas
 *
 * @package App\Models
 */
class Estudiante extends Model
{
	protected $table = 'estudiantes';
	protected $primaryKey = 'idestudiante';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idpersonal' => 'int'
	];

	protected $fillable = [
		'idseccion',
		'idpersonal',
		'idgrado',
		'idespecialidad',
		'carnetmenoridad',
		'modalidad',
		'estadoestudiante',
		'inscrito'
	];

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'idespecialidad');
	}

	public function grado()
	{
		return $this->belongsTo(Grado::class, 'idgrado');
	}

	public function seccione()
	{
		return $this->belongsTo(Seccione::class, 'idseccion');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idpersonal');
	}

	public function familiares()
	{
		return $this->hasMany(Familiare::class, 'idestudiante');
	}

	public function voletanotas()
	{
		return $this->hasMany(Voletanota::class, 'idestudiante');
	}
}
