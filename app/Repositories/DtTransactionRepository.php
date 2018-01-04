<?php

namespace App\Repositories;

use App\Models\DtTransaction;
use InfyOm\Generator\Common\BaseRepository;

class DtTransactionRepository extends BaseRepository
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
        return DtTransaction::class;
    }
}
