<?php

namespace App\Repositories;

use App\Models\Akad;
use InfyOm\Generator\Common\BaseRepository;

class AkadRepository extends BaseRepository
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
        return Akad::class;
    }
}
