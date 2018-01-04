<?php

namespace App\Repositories;

use App\Models\Province;
use InfyOm\Generator\Common\BaseRepository;

class ProvinceRepository extends BaseRepository
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
        return Province::class;
    }
}
