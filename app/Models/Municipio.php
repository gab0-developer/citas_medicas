<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 * 
 * @property int $id
 * @property string $municipios
 * @property int $estado_id
 * 
 * @property Estado $estado
 * @property Collection|Parroquia[] $parroquias
 * @property Collection|Ciudadano[] $ciudadanos
 *
 * @package App\Models
 */
class Municipio extends Model
{
	protected $table = 'municipios';
	public $timestamps = false;

	protected $casts = [
		'estado_id' => 'int'
	];

	protected $fillable = [
		'municipios',
		'estado_id'
	];

	public function estado()
	{
		return $this->belongsTo(Estado::class);
	}

	public function parroquias()
	{
		return $this->hasMany(Parroquia::class);
	}

	public function ciudadanos()
	{
		return $this->hasMany(Ciudadano::class);
	}
}
