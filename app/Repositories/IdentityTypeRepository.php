<?php

namespace App\Repositories;

use App\Models\IdentityType;
use InfyOm\Generator\Common\BaseRepository;

class IdentityTypeRepository extends BaseRepository
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
        return IdentityType::class;
    }
}
