<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SpectrumGlobal
 * 
 * @property string $ip
 * @property string|null $spectrum
 * @property string|null $reason
 * @property string|null $desban
 *
 * @package App\Models
 */
class SpectrumGlobal extends Model
{
	protected $table = 'spectrum_global';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'ip',
		'spectrum',
		'reason',
		'desban'
	];
}
