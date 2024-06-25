<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Docente
 * 
 * @property string $iddocente
 * @property string|null $idseccion
 * @property int|null $idpersonal
 * @property string|null $NUP
 * @property string|null $INPEP
 * @property string|null $ISSS
 * @property string|null $NIT
 * @property string|null $AFP
 * @property string|null $IPSFA
 * @property string|null $ISBM
 * 
 * @property Seccione|null $seccione
 * @property Persona|null $persona
 *
 * @package App\Models
 */
class Docente extends Model
{
	protected $table = 'docentes';
	protected $primaryKey = 'iddocente';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idpersonal' => 'int'
	];

	protected $fillable = [
		'idseccion',
		'idpersonal',
		'NUP',
		'INPEP',
		'ISSS',
		'NIT',
		'AFP',
		'IPSFA',
		'ISBM'
	];

	public function seccione()
	{
		return $this->belongsTo(Seccione::class, 'idseccion');
	}

	public function persona()
	{
		return $this->belongsTo(Persona::class, 'idpersonal');
	}
}
