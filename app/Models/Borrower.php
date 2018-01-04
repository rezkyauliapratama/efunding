<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Borrower
 * @package App\Models
 * @version January 4, 2018, 4:59 pm UTC
 */
class Borrower extends Model
{
    use SoftDeletes;

    public $table = 'borrowers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'address',
        'birth_date',
        'birth_place',
        'facebook_url',
        'field_work',
        'gender',
        'heir',
        'heir_phone_number',
        'identity_image',
        'identity_number',
        'instagram_twitter_url',
        'last_education',
        'married_status',
        'name',
        'npwp_image',
        'npwp_number',
        'phone_number',
        'relation_with_heir',
        'religion',
        'website_url',
        'work',
        'user_id',
        'identity_type_id',
        'range_salary_id',
        'sub_district_id',
        'city_id',
        'province_id',
        'urban_village_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'birth_place' => 'string',
        'facebook_url' => 'string',
        'field_work' => 'string',
        'gender' => 'string',
        'heir' => 'string',
        'heir_phone_number' => 'string',
        'identity_image' => 'string',
        'identity_number' => 'string',
        'instagram_twitter_url' => 'string',
        'last_education' => 'string',
        'married_status' => 'string',
        'name' => 'string',
        'npwp_image' => 'string',
        'npwp_number' => 'string',
        'phone_number' => 'string',
        'relation_with_heir' => 'string',
        'religion' => 'string',
        'website_url' => 'string',
        'work' => 'string',
        'user_id' => 'integer',
        'identity_type_id' => 'integer',
        'range_salary_id' => 'integer',
        'sub_district_id' => 'integer',
        'city_id' => 'integer',
        'province_id' => 'integer',
        'urban_village_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'address' => 'required',
        'birth_date' => 'required',
        'birth_place' => 'required',
        'facebook_url' => 'required',
        'field_work' => 'required',
        'gender' => 'required',
        'heir' => 'required',
        'heir_phone_number' => 'required',
        'identity_image' => 'required',
        'identity_number' => 'required',
        'instagram_twitter_url' => 'required',
        'last_education' => 'required',
        'married_status' => 'required',
        'name' => 'required',
        'npwp_image' => 'required',
        'npwp_number' => 'required',
        'phone_number' => 'required',
        'relation_with_heir' => 'required',
        'religion' => 'required',
        'website_url' => 'required',
        'work' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function identityType()
    {
        return $this->belongsTo(\App\Models\IdentityType::class, 'identity_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rangeSalary()
    {
        return $this->belongsTo(\App\Models\RangeSalary::class, 'range_salary_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function subDistrict()
    {
        return $this->belongsTo(\App\Models\SubDistrict::class, 'sub_district_id', 'id');
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
    public function province()
    {
        return $this->belongsTo(\App\Models\Province::class, 'province_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function urbanVillage()
    {
        return $this->belongsTo(\App\Models\UrbanVillage::class, 'urban_village_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function campaigns()
    {
        return $this->hasMany(\App\Models\Campaign::class);
    }
}
