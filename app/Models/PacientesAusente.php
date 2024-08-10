<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PacientesAusente
 * 
 * @property int $id
 * @property int $paciente_id
 *
 * @package App\Models
 */
class PacientesAusente extends Model
{
	protected $table = 'pacientes_ausentes';
	public $timestamps = false;

	protected $casts = [
		'paciente_id' => 'int'
	];

	protected $fillable = [
		'paciente_id'
	];
}
