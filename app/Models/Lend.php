<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Lend
 * @package App\Models
 * @version January 4, 2018, 6:02 pm UTC
 */
class Lend extends Model
{
    use SoftDeletes;

    public $table = 'lends';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'birth_date',
        'birth_place',
        'gender',
        'last_education',
        'married_status',
        'religion',
        'phone_number',
        'facebook_url',
        'instagram_twitter_url',
        'website_url',
        'address',
        'identity_number',
        'identity_image',
        'npwp_number',
        'npwp_image',
        'work',
        'field_work',
        'heir',
        'heir_phone_number',
        'relation_with_heir',
        'user_id',
        'identity_type_id',
        'range_salary_id',
        'province_id',
        'city_id',
        'sub_district_id',
        'urban_village_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'birth_place' => 'string',
        'gender' => 'string',
        'last_education' => 'string',
        'married_status' => 'string',
        'religion' => 'string',
        'phone_number' => 'string',
        'facebook_url' => 'string',
        'instagram_twitter_url' => 'string',
        'website_url' => 'string',
        'address' => 'string',
        'identity_number' => 'string',
        'identity_image' => 'string',
        'npwp_number' => 'string',
        'npwp_image' => 'string',
        'work' => 'string',
        'field_work' => 'string',
        'heir' => 'string',
        'heir_phone_number' => 'string',
        'relation_with_heir' => 'string',
        'user_id' => 'integer',
        'identity_type_id' => 'integer',
        'range_salary_id' => 'integer',
        'province_id' => 'integer',
        'city_id' => 'integer',
        'sub_district_id' => 'integer',
        'urban_village_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'birth_date' => 'required',
        'birth_place' => 'required',
        'gender' => 'required',
        'last_education' => 'required',
        'married_status' => 'required',
        'religion' => 'required',
        'phone_number' => 'required',
        'facebook_url' => 'required',
        'instagram_twitter_url' => 'required',
        'website_url' => 'required',
        'address' => 'required',
        'identity_number' => 'required',
        'identity_image' => 'required',
        'npwp_number' => 'required',
        'npwp_image' => 'required',
        'work' => 'required',
        'field_work' => 'required',
        'heir' => 'required',
        'heir_phone_number' => 'required',
        'relation_with_heir' => 'required'
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
    public function province()
    {
        return $this->belongsTo(\App\Models\Province::class, 'province_id', 'id');
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
    public function subDistrict()
    {
        return $this->belongsTo(\App\Models\SubDistrict::class, 'sub_district_id', 'id');
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transactions()
    {
        return $this->hasMany(\App\Models\Transaction::class);
    }
}
