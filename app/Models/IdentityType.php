<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IdentityType
 * @package App\Models
 * @version January 4, 2018, 4:57 pm UTC
 */
class IdentityType extends Model
{
    use SoftDeletes;

    public $table = 'identity_types';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
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
