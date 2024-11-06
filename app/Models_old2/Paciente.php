<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paciente
 * 
 * @property int $id
 * @property int $ciudadano_id
 * @property int $user_id
 * @property Carbon|null $fecha_registro
 * 
 * @property Ciudadano $ciudadano
 * @property User $user
 * @property Collection|SolicitudCita[] $solicitud_citas
 * @property Collection|PacientesAusente[] $pacientes_ausentes
 *
 * @package App\Models
 */
class Paciente extends Model
{
	protected $table = 'pacientes';
	public $timestamps = false;

	protected $casts = [
		'ciudadano_id' => 'int',
		'user_id' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'ciudadano_id',
		'user_id',
		'fecha_registro'
	];

	public function ciudadano()
	{
		return $this->belongsTo(Ciudadano::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function solicitud_citas()
	{
		return $this->hasMany(SolicitudCita::class);
	}

	public function pacientes_ausentes()
	{
		return $this->hasMany(PacientesAusente::class);
	}
}
