<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 * 
 * @property int $id
 * @property string $estados
 * 
 * @property Collection|Municipio[] $municipios
 * @property Collection|Ciudadano[] $ciudadanos
 *
 * @package App\Models
 */
class Estado extends Model
{
	protected $table = 'estados';
	public $timestamps = false;

	protected $fillable = [
		'estados'
	];

	public function municipios()
	{
		return $this->hasMany(Municipio::class);
	}

	public function ciudadanos()
	{
		return $this->hasMany(Ciudadano::class);
	}
}
