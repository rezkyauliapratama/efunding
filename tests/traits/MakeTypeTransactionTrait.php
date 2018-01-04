<?php

use Faker\Factory as Faker;
use App\Models\TypeTransaction;
use App\Repositories\TypeTransactionRepository;

trait MakeTypeTransactionTrait
{
    /**
     * Create fake instance of TypeTransaction and save it in database
     *
     * @param array $typeTransactionFields
     * @return TypeTransaction
     */
    public function makeTypeTransaction($typeTransactionFields = [])
    {
        /** @var TypeTransactionRepository $typeTransactionRepo */
        $typeTransactionRepo = App::make(TypeTransactionRepository::class);
        $theme = $this->fakeTypeTransactionData($typeTransactionFields);
        return $typeTransactionRepo->create($theme);
    }

    /**
     * Get fake instance of TypeTransaction
     *
     * @param array $typeTransactionFields
     * @return TypeTransaction
     */
    public function fakeTypeTransaction($typeTransactionFields = [])
    {
        return new TypeTransaction($this->fakeTypeTransactionData($typeTransactionFields));
    }

    /**
     * Get fake data of TypeTransaction
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTypeTransactionData($typeTransactionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $typeTransactionFields);
    }
}
