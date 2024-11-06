<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Parroquia
 * 
 * @property int $id
 * @property string $parroquias
 * @property int $municipio_id
 * 
 * @property Municipio $municipio
 * @property Collection|Ciudadano[] $ciudadanos
 *
 * @package App\Models
 */
class Parroquia extends Model
{
	protected $table = 'parroquias';
	public $timestamps = false;

	protected $casts = [
		'municipio_id' => 'int'
	];

	protected $fillable = [
		'parroquias',
		'municipio_id'
	];

	public function municipio()
	{
		return $this->belongsTo(Municipio::class);
	}

	public function ciudadanos()
	{
		return $this->hasMany(Ciudadano::class);
	}
}
