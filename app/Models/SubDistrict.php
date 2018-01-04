<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SubDistrict
 * @package App\Models
 * @version January 4, 2018, 1:40 pm UTC
 */
class SubDistrict extends Model
{
    use SoftDeletes;

    public $table = 'sub_districts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'city_id' => 'integer'
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
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function lends()
    {
        return $this->hasMany(\App\Models\Lend::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function urbanVillages()
    {
        return $this->hasMany(\App\Models\UrbanVillage::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function borrowers()
    {
        return $this->hasMany(\App\Models\Borrower::class);
    }
}
