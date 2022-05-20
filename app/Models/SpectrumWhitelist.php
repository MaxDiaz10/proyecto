<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SpectrumWhitelist
 * 
 * @property string $SpectrumKey
 * @property string $IP
 *
 * @package App\Models
 */
class SpectrumWhitelist extends Model
{
	protected $table = 'spectrum_whitelist';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'SpectrumKey',
		'IP'
	];
}
