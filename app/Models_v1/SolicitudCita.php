<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SolicitudCita
 * 
 * @property int $id
 * @property Carbon $fecha_cita
 * @property time without time zone $hora_cita
 * @property int $tipocita_id
 * @property int $estatu_id
 * @property int $paciente_id
 * @property int $especialidad_tipocita_id
 * @property Carbon|null $fecha_registro
 * 
 * @property Tipocita $tipocita
 * @property Estatus $estatus
 * @property Paciente $paciente
 * @property EspecialidadesTipocita $especialidades_tipocita
 *
 * @package App\Models
 */
class SolicitudCita extends Model
{
	protected $table = 'solicitud_citas';
	public $timestamps = false;

	protected $casts = [
		'fecha_cita' => 'datetime',
		'hora_cita' => 'string',
		'tipocita_id' => 'int',
		'estatu_id' => 'int',
		'paciente_id' => 'int',
		'especialidad_tipocita_id' => 'int',
		'fecha_registro' => 'datetime',
		'observacion' => 'string'
	];

	protected $fillable = [
		'fecha_cita',
		'hora_cita',
		'tipocita_id',
		'estatu_id',
		'paciente_id',
		'especialidad_tipocita_id',
		'fecha_registro',
		'observacion'
	];

	public function tipocita()
	{
		return $this->belongsTo(Tipocita::class);
	}

	public function estatus()
	{
		return $this->belongsTo(Estatus::class, 'estatu_id');
	}

	public function paciente()
	{
		return $this->belongsTo(Paciente::class);
	}

	public function especialidades_tipocita()
	{
		return $this->belongsTo(EspecialidadesTipocita::class, 'especialidad_tipocita_id');
	}
}
