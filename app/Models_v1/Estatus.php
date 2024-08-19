<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Estatus
 * 
 * @property int $id
 * @property string $estatu
 * 
 * @property Collection|SolicitudCita[] $solicitud_citas
 *
 * @package App\Models
 */
class Estatus extends Model
{
	protected $table = 'estatus';
	public $timestamps = false;

	protected $fillable = [
		'estatu'
	];

	public function solicitud_citas()
	{
		return $this->hasMany(SolicitudCita::class, 'estatu_id');
	}
}
