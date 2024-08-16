<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ciudadano
 * 
 * @property int $id
 * @property string $nombre_completo
 * @property string $apellido_completo
 * @property string $sexo
 * @property Carbon $fecha_nacimiento
 * @property string $correo
 * @property string $nro_telefono
 * @property string|null $nro_tlf_secundario
 * @property int $estado_id
 * @property int $municipio_id
 * @property int $parroquia_id
 * 
 * @property Estado $estado
 * @property Municipio $municipio
 * @property Parroquia $parroquia
 * @property Collection|Doctore[] $doctores
 * @property Collection|Paciente[] $pacientes
 *
 * @package App\Models
 */
class Ciudadano extends Model
{
	protected $table = 'ciudadanos';
	public $timestamps = false;

	protected $casts = [
		'fecha_nacimiento' => 'datetime',
		'estado_id' => 'int',
		'municipio_id' => 'int',
		'parroquia_id' => 'int',
		'cedula' => 'int'
	];

	protected $fillable = [
		'nombre_completo',
		'apellido_completo',
		'sexo',
		'fecha_nacimiento',
		'correo',
		'nro_telefono',
		'nro_tlf_secundario',
		'estado_id',
		'municipio_id',
		'parroquia_id',
		'cedula'
	];

	public function estado()
	{
		return $this->belongsTo(Estado::class);
	}

	public function municipio()
	{
		return $this->belongsTo(Municipio::class);
	}

	public function parroquia()
	{
		return $this->belongsTo(Parroquia::class);
	}

	public function doctores()
	{
		return $this->hasMany(Doctore::class);
	}

	public function pacientes()
	{
		return $this->hasMany(Paciente::class);
	}
}
