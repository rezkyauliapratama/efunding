<?php

namespace App\Repositories;

use App\Models\Borrower;
use InfyOm\Generator\Common\BaseRepository;

class BorrowerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        'work'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Borrower::class;
    }
}
