<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAdmin
 * 
 * @property int $id
 * @property int $ciudadano_id
 * @property int $user_id
 * @property Carbon|null $fecha_registro
 * 
 * @property Ciudadano $ciudadano
 * @property User $user
 *
 * @package App\Models
 */
class UserAdmin extends Model
{
	protected $table = 'user_admin';
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
}
