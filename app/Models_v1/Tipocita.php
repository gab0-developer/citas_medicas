<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tipocita
 * 
 * @property int $id
 * @property string $nombre_cita
 * 
 * @property Collection|SolicitudCita[] $solicitud_citas
 * @property Collection|Especialidade[] $especialidades
 *
 * @package App\Models
 */
class Tipocita extends Model
{
	protected $table = 'tipocitas';
	public $timestamps = false;

	protected $fillable = [
		'nombre_cita'
	];

	public function solicitud_citas()
	{
		return $this->hasMany(SolicitudCita::class);
	}

	public function especialidades()
	{
		return $this->belongsToMany(Especialidade::class, 'especialidades_tipocitas', 'tipocita_id', 'especialidad_id')
					->withPivot('id');
	}
}
