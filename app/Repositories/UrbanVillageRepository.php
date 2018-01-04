<?php

namespace App\Repositories;

use App\Models\UrbanVillage;
use InfyOm\Generator\Common\BaseRepository;

class UrbanVillageRepository extends BaseRepository
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
        return UrbanVillage::class;
    }
}
