<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PacientesAusente
 * 
 * @property int $id
 * @property int $paciente_id
 * @property Carbon|null $fecha_registro
 * @property string|null $nombre_cita
 * 
 * @property Paciente $paciente
 *
 * @package App\Models
 */
class PacientesAusente extends Model
{
	protected $table = 'pacientes_ausentes';
	public $timestamps = false;

	protected $casts = [
		'paciente_id' => 'int',
		'fecha_registro' => 'datetime'
	];

	protected $fillable = [
		'paciente_id',
		'fecha_registro',
		'nombre_cita'
	];

	public function paciente()
	{
		return $this->belongsTo(Paciente::class);
	}
}
