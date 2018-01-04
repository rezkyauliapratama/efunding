<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class UrbanVillage
 * @package App\Models
 * @version January 4, 2018, 2:08 pm UTC
 */
class UrbanVillage extends Model
{
    use SoftDeletes;

    public $table = 'urban_villages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'sub_district_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'sub_district_id' => 'integer'
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
    public function subDistrict()
    {
        return $this->belongsTo(\App\Models\SubDistrict::class, 'sub_district_id', 'id');
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
    public function borrowers()
    {
        return $this->hasMany(\App\Models\Borrower::class);
    }
}
