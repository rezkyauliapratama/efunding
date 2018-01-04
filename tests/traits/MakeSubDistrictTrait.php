<?php

use Faker\Factory as Faker;
use App\Models\SubDistrict;
use App\Repositories\SubDistrictRepository;

trait MakeSubDistrictTrait
{
    /**
     * Create fake instance of SubDistrict and save it in database
     *
     * @param array $subDistrictFields
     * @return SubDistrict
     */
    public function makeSubDistrict($subDistrictFields = [])
    {
        /** @var SubDistrictRepository $subDistrictRepo */
        $subDistrictRepo = App::make(SubDistrictRepository::class);
        $theme = $this->fakeSubDistrictData($subDistrictFields);
        return $subDistrictRepo->create($theme);
    }

    /**
     * Get fake instance of SubDistrict
     *
     * @param array $subDistrictFields
     * @return SubDistrict
     */
    public function fakeSubDistrict($subDistrictFields = [])
    {
        return new SubDistrict($this->fakeSubDistrictData($subDistrictFields));
    }

    /**
     * Get fake data of SubDistrict
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSubDistrictData($subDistrictFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'city_id' => $fake->randomDigitNotNull
        ], $subDistrictFields);
    }
}
