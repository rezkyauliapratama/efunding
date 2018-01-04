<?php

use Faker\Factory as Faker;
use App\Models\City;
use App\Repositories\CityRepository;

trait MakeCityTrait
{
    /**
     * Create fake instance of City and save it in database
     *
     * @param array $cityFields
     * @return City
     */
    public function makeCity($cityFields = [])
    {
        /** @var CityRepository $cityRepo */
        $cityRepo = App::make(CityRepository::class);
        $theme = $this->fakeCityData($cityFields);
        return $cityRepo->create($theme);
    }

    /**
     * Get fake instance of City
     *
     * @param array $cityFields
     * @return City
     */
    public function fakeCity($cityFields = [])
    {
        return new City($this->fakeCityData($cityFields));
    }

    /**
     * Get fake data of City
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCityData($cityFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'province_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cityFields);
    }
}
