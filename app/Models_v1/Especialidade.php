<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Especialidade
 * 
 * @property int $id
 * @property string $especialidad
 * 
 * @property Collection|Doctore[] $doctores
 * @property Collection|Tipocita[] $tipocitas
 *
 * @package App\Models
 */
class Especialidade extends Model
{
	protected $table = 'especialidades';
	public $timestamps = false;

	protected $fillable = [
		'especialidad'
	];

	public function doctores()
	{
		return $this->hasMany(Doctore::class, 'especialidad_id');
	}

	public function tipocitas()
	{
		return $this->belongsToMany(Tipocita::class, 'especialidades_tipocitas', 'especialidad_id')
					->withPivot('id');
	}
}
