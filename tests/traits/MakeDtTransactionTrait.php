<?php

use Faker\Factory as Faker;
use App\Models\DtTransaction;
use App\Repositories\DtTransactionRepository;

trait MakeDtTransactionTrait
{
    /**
     * Create fake instance of DtTransaction and save it in database
     *
     * @param array $dtTransactionFields
     * @return DtTransaction
     */
    public function makeDtTransaction($dtTransactionFields = [])
    {
        /** @var DtTransactionRepository $dtTransactionRepo */
        $dtTransactionRepo = App::make(DtTransactionRepository::class);
        $theme = $this->fakeDtTransactionData($dtTransactionFields);
        return $dtTransactionRepo->create($theme);
    }

    /**
     * Get fake instance of DtTransaction
     *
     * @param array $dtTransactionFields
     * @return DtTransaction
     */
    public function fakeDtTransaction($dtTransactionFields = [])
    {
        return new DtTransaction($this->fakeDtTransactionData($dtTransactionFields));
    }

    /**
     * Get fake data of DtTransaction
     *
     * @param array $postFields
     * @return array
     */
    public function fakeDtTransactionData($dtTransactionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'transaction_id' => $fake->randomDigitNotNull,
            'investment_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $dtTransactionFields);
    }
}
