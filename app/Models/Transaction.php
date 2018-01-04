<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 * @package App\Models
 * @version January 4, 2018, 6:20 pm UTC
 */
class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'total_transaction',
        'type_transaction_id',
        'lend_id',
        'bank_account_id_from',
        'bank_account_id_to'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'total_transaction' => 'integer',
        'type_transaction_id' => 'integer',
        'lend_id' => 'integer',
        'bank_account_id_from' => 'integer',
        'bank_account_id_to' => 'integer'
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
    public function typeTransaction()
    {
        return $this->belongsTo(\App\Models\TypeTransaction::class, 'type_transaction_id', 'id');
    }

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
    public function bankAccountFrom()
    {
        return $this->belongsTo(\App\Models\BankAccount::class, 'bank_account_id_from', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bankAccountTo()
    {
        return $this->belongsTo(\App\Models\BankAccount::class, 'bank_account_id_to', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function dtTransactions()
    {
        return $this->hasMany(\App\Models\DtTransaction::class);
    }
}
