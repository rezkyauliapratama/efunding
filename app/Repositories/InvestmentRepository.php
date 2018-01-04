<?php

namespace App\Repositories;

use App\Models\Investment;
use InfyOm\Generator\Common\BaseRepository;

class InvestmentRepository extends BaseRepository
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
        return Investment::class;
    }
}
