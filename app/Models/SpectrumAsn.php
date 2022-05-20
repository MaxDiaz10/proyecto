<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SpectrumAsn
 * 
 * @property int $ASN
 * @property string|null $Company
 * @property string $Network
 *
 * @package App\Models
 */
class SpectrumAsn extends Model
{
	protected $table = 'spectrum_asn';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ASN' => 'int'
	];

	protected $fillable = [
		'ASN',
		'Company',
		'Network'
	];
}
