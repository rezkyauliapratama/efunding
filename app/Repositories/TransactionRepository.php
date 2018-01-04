<?php

namespace App\Repositories;

use App\Models\Transaction;
use InfyOm\Generator\Common\BaseRepository;

class TransactionRepository extends BaseRepository
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
        return Transaction::class;
    }
}
