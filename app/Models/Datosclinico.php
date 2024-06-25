<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Datosclinico
 * 
 * @property int $iddatosclinicos
 * @property int|null $idpersonal
 * @property bool|null $alergicomedicamentos
 * @property bool|null $alergicoalimientos
 * @property bool|null $alergiaotros
 * @property string|null $alergiadetalles
 * @property bool|null $enfermedadescronicas
 * @property bool|null $tratamientos
 * @property string|null $tratamientosdetalles
 * @property string|null $tiposangre
 * @property bool|null $medicamentopermanente
 * @property string|null $detallemedicamentopermanente
 * @property string|null $doctorchequea
 * @property string|null $telefonodoctorchequea
 * @property string|null $nombrecontactoemergencia
 * @property string|null $telefonocontactoemergencia
 * 
 * @property Persona|null $persona
 *
 * @package App\Models
 */
class Datosclinico extends Model
{
	protected $table = 'datosclinicos';
	protected $primaryKey = 'iddatosclinicos';
	public $timestamps = false;

	protected $casts = [
		'idpersonal' => 'int',
		'alergicomedicamentos' => 'bool',
		'alergicoalimientos' => 'bool',
		'alergiaotros' => 'bool',
		'enfermedadescronicas' => 'bool',
		'tratamientos' => 'bool',
		'medicamentopermanente' => 'bool'
	];

	protected $fillable = [
		'idpersonal',
		'alergicomedicamentos',
		'alergicoalimientos',
		'alergiaotros',
		'alergiadetalles',
		'enfermedadescronicas',
		'tratamientos',
		'tratamientosdetalles',
		'tiposangre',
		'medicamentopermanente',
		'detallemedicamentopermanente',
		'doctorchequea',
		'telefonodoctorchequea',
		'nombrecontactoemergencia',
		'telefonocontactoemergencia'
	];

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idpersonal');
	}
}
