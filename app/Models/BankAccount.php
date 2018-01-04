<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BankAccount
 * @package App\Models
 * @version January 4, 2018, 6:15 pm UTC
 */
class BankAccount extends Model
{
    use SoftDeletes;

    public $table = 'bank_accounts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'account_number',
        'bank_id',
        'campaign_id',
        'lend_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'account_number' => 'integer',
        'bank_id' => 'integer',
        'campaign_id' => 'integer',
        'lend_id' => 'integer'
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
    public function bank()
    {
        return $this->belongsTo(\App\Models\Bank::class, 'bank_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function campaign()
    {
        return $this->belongsTo(\App\Models\Campaign::class, 'campaign_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function lend()
    {
        return $this->belongsTo(\App\Models\Lend::class, 'lend_id', 'id');
    }
}
