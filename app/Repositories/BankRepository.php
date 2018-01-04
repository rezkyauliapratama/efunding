<?php

namespace App\Repositories;

use App\Models\Bank;
use InfyOm\Generator\Common\BaseRepository;

class BankRepository extends BaseRepository
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
        return Bank::class;
    }
}
