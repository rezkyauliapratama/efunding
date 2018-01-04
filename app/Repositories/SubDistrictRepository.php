<?php

namespace App\Repositories;

use App\Models\SubDistrict;
use InfyOm\Generator\Common\BaseRepository;

class SubDistrictRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SubDistrict::class;
    }
}
