<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Investment
 * @package App\Models
 * @version January 4, 2018, 6:05 pm UTC
 */
class Investment extends Model
{
    use SoftDeletes;

    public $table = 'investments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'total_investment',
        'lend_id',
        'campaign_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'total_investment' => 'integer',
        'lend_id' => 'integer',
        'campaign_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lend()
    {
        return $this->belongsTo(\App\Models\Lend::class, 'lend_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campaign()
    {
        return $this->belongsTo(\App\Models\Campaign::class, 'campaign_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dtTransactions()
    {
        return $this->hasMany(\App\Models\DtTransaction::class);
    }
}
