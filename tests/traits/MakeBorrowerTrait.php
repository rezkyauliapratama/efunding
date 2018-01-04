<?php

use Faker\Factory as Faker;
use App\Models\Borrower;
use App\Repositories\BorrowerRepository;

trait MakeBorrowerTrait
{
    /**
     * Create fake instance of Borrower and save it in database
     *
     * @param array $borrowerFields
     * @return Borrower
     */
    public function makeBorrower($borrowerFields = [])
    {
        /** @var BorrowerRepository $borrowerRepo */
        $borrowerRepo = App::make(BorrowerRepository::class);
        $theme = $this->fakeBorrowerData($borrowerFields);
        return $borrowerRepo->create($theme);
    }

    /**
     * Get fake instance of Borrower
     *
     * @param array $borrowerFields
     * @return Borrower
     */
    public function fakeBorrower($borrowerFields = [])
    {
        return new Borrower($this->fakeBorrowerData($borrowerFields));
    }

    /**
     * Get fake data of Borrower
     *
     * @param array $postFields
     * @return array
     */
    public function fakeBorrowerData($borrowerFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'address' => $fake->word,
            'birth_date' => $fake->word,
            'birth_place' => $fake->word,
            'facebook_url' => $fake->word,
            'field_work' => $fake->word,
            'gender' => $fake->word,
            'heir' => $fake->word,
            'heir_phone_number' => $fake->word,
            'identity_image' => $fake->word,
            'identity_number' => $fake->word,
            'instagram_twitter_url' => $fake->word,
            'last_education' => $fake->word,
            'married_status' => $fake->word,
            'name' => $fake->word,
            'npwp_image' => $fake->word,
            'npwp_number' => $fake->word,
            'phone_number' => $fake->word,
            'relation_with_heir' => $fake->word,
            'religion' => $fake->word,
            'website_url' => $fake->word,
            'work' => $fake->word,
            'user_id' => $fake->randomDigitNotNull,
            'identity_type_id' => $fake->randomDigitNotNull,
            'range_salary_id' => $fake->randomDigitNotNull,
            'sub_district_id' => $fake->randomDigitNotNull,
            'city_id' => $fake->randomDigitNotNull,
            'province_id' => $fake->randomDigitNotNull,
            'urban_village_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $borrowerFields);
    }
}
