<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SpectrumNetwork
 * 
 * @property int $Id
 * @property string|null $Network
 *
 * @package App\Models
 */
class SpectrumNetwork extends Model
{
	protected $table = 'spectrum_network';
	protected $primaryKey = 'Id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Id' => 'int'
	];

	protected $fillable = [
		'Network'
	];
}
