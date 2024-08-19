<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Doctore
 * 
 * @property int $id
 * @property string $mpps
 * @property int $ciudadano_id
 * @property int $especialidad_id
 * @property int $user_id
 * 
 * @property Ciudadano $ciudadano
 * @property Especialidade $especialidade
 * @property User $user
 *
 * @package App\Models
 */
class Doctore extends Model
{
	protected $table = 'doctores';
	public $timestamps = false;

	protected $casts = [
		'ciudadano_id' => 'int',
		'especialidad_id' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'mpps',
		'ciudadano_id',
		'especialidad_id',
		'user_id'
	];

	public function ciudadano()
	{
		return $this->belongsTo(Ciudadano::class);
	}

	public function especialidade()
	{
		return $this->belongsTo(Especialidade::class, 'especialidad_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
