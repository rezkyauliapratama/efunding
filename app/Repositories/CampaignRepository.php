<?php

namespace App\Repositories;

use App\Models\Campaign;
use InfyOm\Generator\Common\BaseRepository;

class CampaignRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'time_range',
        'started_at',
        'deadline',
        'description',
        'long_description',
        'image'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Campaign::class;
    }
}
