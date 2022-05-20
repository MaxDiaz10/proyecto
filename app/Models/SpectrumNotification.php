<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SpectrumNotification
 * 
 * @property string $spectrum
 * @property string $email
 *
 * @package App\Models
 */
class SpectrumNotification extends Model
{
	protected $table = 'spectrum_notification';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'spectrum',
		'email'
	];
}
