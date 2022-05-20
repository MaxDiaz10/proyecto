<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SpectrumBalancer
 * 
 * @property string|null $SpectrumKey
 * @property int|null $SlavePort
 * @property int $Connections
 * @property int $LimitConnections
 * @property int $BlockingUSA
 * @property int $BalancingUSA
 * @property int $InAttack
 * @property int $ProcessingMigration
 * @property int $ChangingPort
 * @property int $ProcessingAction
 * @property int $NeedChangePort
 * @property int $Requests
 *
 * @package App\Models
 */
class SpectrumBalancer extends Model
{
	protected $table = 'spectrum_balancer';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'SlavePort' => 'int',
		'Connections' => 'int',
		'LimitConnections' => 'int',
		'BlockingUSA' => 'int',
		'BalancingUSA' => 'int',
		'InAttack' => 'int',
		'ProcessingMigration' => 'int',
		'ChangingPort' => 'int',
		'ProcessingAction' => 'int',
		'NeedChangePort' => 'int',
		'Requests' => 'int'
	];

	protected $fillable = [
		'SpectrumKey',
		'SlavePort',
		'Connections',
		'LimitConnections',
		'BlockingUSA',
		'BalancingUSA',
		'InAttack',
		'ProcessingMigration',
		'ChangingPort',
		'ProcessingAction',
		'NeedChangePort',
		'Requests'
	];
}
