<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seccione
 * 
 * @property string $idseccion
 * @property string|null $idgrado
 * @property string $idespecialidad
 * @property string|null $idgrupos
 * @property string $idaula
 * @property int $cantidad
 * @property int $inscritos
 * @property string|null $estado
 * 
 * @property Aula $aula
 * @property Especialidade $especialidade
 * @property Grado|null $grado
 * @property Grupo|null $grupo
 * @property Collection|Docente[] $docentes
 * @property Collection|Estudiante[] $estudiantes
 * @property Collection|Horario[] $horarios
 *
 * @package App\Models
 */
class Seccione extends Model
{
	protected $table = 'secciones';
	protected $primaryKey = 'idseccion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'cantidad' => 'int',
		'inscritos' => 'int'
	];

	protected $fillable = [
		'idgrado',
		'idespecialidad',
		'idgrupos',
		'idaula',
		'cantidad',
		'inscritos',
		'estado'
	];

	public function aula()
	{
		return $this->belongsTo(Aula::class, 'idaula');
	}

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'idespecialidad');
	}

	public function grado()
	{
		return $this->belongsTo(Grado::class, 'idgrado');
	}

	public function grupo()
	{
		return $this->belongsTo(Grupo::class, 'idgrupos');
	}

	public function docentes()
	{
		return $this->hasMany(Docente::class, 'idseccion');
	}

	public function estudiantes()
	{
		return $this->hasMany(Estudiante::class, 'idseccion');
	}

	public function horarios()
	{
		return $this->hasMany(Horario::class, 'idseccion');
	}
}
