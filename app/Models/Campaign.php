<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Campaign
 * @package App\Models
 * @version January 4, 2018, 5:22 pm UTC
 */
class Campaign extends Model
{
    use SoftDeletes;

    public $table = 'campaigns';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'estimated_return',
        'time_range',
        'started_at',
        'deadline',
        'target_investment',
        'description',
        'long_description',
        'image',
        'akad_id',
        'city_id',
        'category_id',
        'borrower_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'estimated_return' => 'integer',
        'time_range' => 'string',
        'started_at' => 'datetime',
        'deadline' => 'datetime',
        'target_investment' => 'integer',
        'description' => 'string',
        'long_description' => 'string',
        'image' => 'string',
        'akad_id' => 'integer',
        'city_id' => 'integer',
        'category_id' => 'integer',
        'borrower_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'time_range' => 'required',
        'description' => 'required',
        'long_description' => 'required',
        'image' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function akad()
    {
        return $this->belongsTo(\App\Models\Akad::class, 'akad_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function borrower()
    {
        return $this->belongsTo(\App\Models\Borrower::class, 'borrower', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function investments()
    {
        return $this->hasMany(\App\Models\Investment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function bankAccounts()
    {
        return $this->hasMany(\App\Models\BankAccount::class);
    }
}
