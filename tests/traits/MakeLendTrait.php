<?php

use Faker\Factory as Faker;
use App\Models\Lend;
use App\Repositories\LendRepository;

trait MakeLendTrait
{
    /**
     * Create fake instance of Lend and save it in database
     *
     * @param array $lendFields
     * @return Lend
     */
    public function makeLend($lendFields = [])
    {
        /** @var LendRepository $lendRepo */
        $lendRepo = App::make(LendRepository::class);
        $theme = $this->fakeLendData($lendFields);
        return $lendRepo->create($theme);
    }

    /**
     * Get fake instance of Lend
     *
     * @param array $lendFields
     * @return Lend
     */
    public function fakeLend($lendFields = [])
    {
        return new Lend($this->fakeLendData($lendFields));
    }

    /**
     * Get fake data of Lend
     *
     * @param array $postFields
     * @return array
     */
    public function fakeLendData($lendFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'birth_date' => $fake->word,
            'birth_place' => $fake->word,
            'gender' => $fake->word,
            'last_education' => $fake->word,
            'married_status' => $fake->word,
            'religion' => $fake->word,
            'phone_number' => $fake->word,
            'facebook_url' => $fake->word,
            'instagram_twitter_url' => $fake->word,
            'website_url' => $fake->word,
            'address' => $fake->word,
            'identity_number' => $fake->word,
            'identity_image' => $fake->word,
            'npwp_number' => $fake->word,
            'npwp_image' => $fake->word,
            'work' => $fake->word,
            'field_work' => $fake->word,
            'heir' => $fake->word,
            'heir_phone_number' => $fake->word,
            'relation_with_heir' => $fake->word,
            'user_id' => $fake->randomDigitNotNull,
            'identity_type_id' => $fake->randomDigitNotNull,
            'range_salary_id' => $fake->randomDigitNotNull,
            'province_id' => $fake->randomDigitNotNull,
            'city_id' => $fake->randomDigitNotNull,
            'sub_district_id' => $fake->randomDigitNotNull,
            'urban_village_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $lendFields);
    }
}
