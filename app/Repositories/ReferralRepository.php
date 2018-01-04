<?php

namespace App\Repositories;

use App\Models\Referral;
use InfyOm\Generator\Common\BaseRepository;

class ReferralRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Referral::class;
    }
}
