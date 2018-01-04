<?php

use Faker\Factory as Faker;
use App\Models\UrbanVillage;
use App\Repositories\UrbanVillageRepository;

trait MakeUrbanVillageTrait
{
    /**
     * Create fake instance of UrbanVillage and save it in database
     *
     * @param array $urbanVillageFields
     * @return UrbanVillage
     */
    public function makeUrbanVillage($urbanVillageFields = [])
    {
        /** @var UrbanVillageRepository $urbanVillageRepo */
        $urbanVillageRepo = App::make(UrbanVillageRepository::class);
        $theme = $this->fakeUrbanVillageData($urbanVillageFields);
        return $urbanVillageRepo->create($theme);
    }

    /**
     * Get fake instance of UrbanVillage
     *
     * @param array $urbanVillageFields
     * @return UrbanVillage
     */
    public function fakeUrbanVillage($urbanVillageFields = [])
    {
        return new UrbanVillage($this->fakeUrbanVillageData($urbanVillageFields));
    }

    /**
     * Get fake data of UrbanVillage
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUrbanVillageData($urbanVillageFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'sub_district_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $urbanVillageFields);
    }
}
