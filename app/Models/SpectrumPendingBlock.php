<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SpectrumPendingBlock
 * 
 * @property string $ip
 * @property string|null $spectrum
 *
 * @package App\Models
 */
class SpectrumPendingBlock extends Model
{
	protected $table = 'spectrum_pending_blocks';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'ip',
		'spectrum'
	];
}
