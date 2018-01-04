<?php

namespace App\Repositories;

use App\Models\Lend;
use InfyOm\Generator\Common\BaseRepository;

class LendRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'relation_with_heir'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Lend::class;
    }
}
