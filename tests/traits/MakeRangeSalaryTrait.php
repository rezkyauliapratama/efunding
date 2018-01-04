<?php

use Faker\Factory as Faker;
use App\Models\RangeSalary;
use App\Repositories\RangeSalaryRepository;

trait MakeRangeSalaryTrait
{
    /**
     * Create fake instance of RangeSalary and save it in database
     *
     * @param array $rangeSalaryFields
     * @return RangeSalary
     */
    public function makeRangeSalary($rangeSalaryFields = [])
    {
        /** @var RangeSalaryRepository $rangeSalaryRepo */
        $rangeSalaryRepo = App::make(RangeSalaryRepository::class);
        $theme = $this->fakeRangeSalaryData($rangeSalaryFields);
        return $rangeSalaryRepo->create($theme);
    }

    /**
     * Get fake instance of RangeSalary
     *
     * @param array $rangeSalaryFields
     * @return RangeSalary
     */
    public function fakeRangeSalary($rangeSalaryFields = [])
    {
        return new RangeSalary($this->fakeRangeSalaryData($rangeSalaryFields));
    }

    /**
     * Get fake data of RangeSalary
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRangeSalaryData($rangeSalaryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $rangeSalaryFields);
    }
}
