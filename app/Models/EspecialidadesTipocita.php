<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EspecialidadesTipocita
 * 
 * @property int $id
 * @property int $especialidad_id
 * @property int $tipocita_id
 * 
 * @property Especialidade $especialidade
 * @property Tipocita $tipocita
 * @property Collection|SolicitudCita[] $solicitud_citas
 *
 * @package App\Models
 */
class EspecialidadesTipocita extends Model
{
	protected $table = 'especialidades_tipocitas';
	public $timestamps = false;

	protected $casts = [
		'especialidad_id' => 'int',
		'tipocita_id' => 'int'
	];

	protected $fillable = [
		'especialidad_id',
		'tipocita_id'
	];

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'especialidad_id');
	}

	public function tipocita()
	{
		return $this->belongsTo(Tipocita::class);
	}

	public function solicitud_citas()
	{
		return $this->hasMany(SolicitudCita::class, 'especialidad_tipocita_id');
	}
}
