<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DtTransaction
 * @package App\Models
 * @version January 4, 2018, 6:12 pm UTC
 */
class DtTransaction extends Model
{
    use SoftDeletes;

    public $table = 'dt_transactions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'transaction_id',
        'investment_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'transaction_id' => 'integer',
        'investment_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaction()
    {
        return $this->belongsTo(\App\Models\Transaction::class, 'transaction_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function investment()
    {
        return $this->belongsTo(\App\Models\Investment::class, 'investment_id', 'id');
    }
}
