<?php

namespace App\Repositories;

use App\Models\TypeTransaction;
use InfyOm\Generator\Common\BaseRepository;

class TypeTransactionRepository extends BaseRepository
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
        return TypeTransaction::class;
    }
}
