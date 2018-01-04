<?php

namespace App\Repositories;

use App\Models\RangeSalary;
use InfyOm\Generator\Common\BaseRepository;

class RangeSalaryRepository extends BaseRepository
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
        return RangeSalary::class;
    }
}
