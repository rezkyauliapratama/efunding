<?php

use Faker\Factory as Faker;
use App\Models\Investment;
use App\Repositories\InvestmentRepository;

trait MakeInvestmentTrait
{
    /**
     * Create fake instance of Investment and save it in database
     *
     * @param array $investmentFields
     * @return Investment
     */
    public function makeInvestment($investmentFields = [])
    {
        /** @var InvestmentRepository $investmentRepo */
        $investmentRepo = App::make(InvestmentRepository::class);
        $theme = $this->fakeInvestmentData($investmentFields);
        return $investmentRepo->create($theme);
    }

    /**
     * Get fake instance of Investment
     *
     * @param array $investmentFields
     * @return Investment
     */
    public function fakeInvestment($investmentFields = [])
    {
        return new Investment($this->fakeInvestmentData($investmentFields));
    }

    /**
     * Get fake data of Investment
     *
     * @param array $postFields
     * @return array
     */
    public function fakeInvestmentData($investmentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'total_investment' => $fake->randomDigitNotNull,
            'lend_id' => $fake->randomDigitNotNull,
            'campaign_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $investmentFields);
    }
}
