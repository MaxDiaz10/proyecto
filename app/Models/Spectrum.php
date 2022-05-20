<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Spectrum
 *
 * @property string|null $SpectrumKey
 * @property string|null $ClientKey
 * @property int|null $Network
 * @property string|null $Site
 * @property string|null $IP
 * @property int|null $Port
 * @property int $BlockPolonia
 * @property int $BlockPanama
 * @property int|null $Transit
 * @property int $Destroy
 * @property string $Registry
 * @property int|null $TodayFloods
 * @property int|null $TodayAttacks
 * @property int|null $TodayRequests
 * @property int|null $TotalFloods
 * @property int|null $TotalAttacks
 * @property int|null $TopRequests
 * @property int|null $TopAttacks
 * @property int|null $TopFloods
 * @property int|null $Day
 *
 * @package App\Models
 */
class Spectrum extends Model
{

    protected $table = 'spectrum';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $casts = [
        'Id' => 'int',
        'Network' => 'int',
        'Port' => 'int',
        'BlockPolonia' => 'int',
        'BlockPanama' => 'int',
        'Transit' => 'int',
        'Destroy' => 'int',
        'TodayFloods' => 'int',
        'TodayAttacks' => 'int',
        'TodayRequests' => 'int',
        'TotalFloods' => 'int',
        'TotalAttacks' => 'int',
        'TopRequests' => 'int',
        'TopAttacks' => 'int',
        'TopFloods' => 'int',
        'Day' => 'int',
    ];

    protected $fillable = [
        'id',
        'SpectrumKey',
        'ClientKey',
        'Network',
        'Site',
        'IP',
        'Port',
        'BlockPolonia',
        'BlockPanama',
        'Transit',
        'Destroy',
        'Registry',
        'TodayFloods',
        'TodayAttacks',
        'TodayRequests',
        'TotalFloods',
        'TotalAttacks',
        'TopRequests',
        'TopAttacks',
        'TopFloods',
        'Day',
    ];
}
