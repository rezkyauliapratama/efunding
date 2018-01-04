<?php

use Faker\Factory as Faker;
use App\Models\IdentityType;
use App\Repositories\IdentityTypeRepository;

trait MakeIdentityTypeTrait
{
    /**
     * Create fake instance of IdentityType and save it in database
     *
     * @param array $identityTypeFields
     * @return IdentityType
     */
    public function makeIdentityType($identityTypeFields = [])
    {
        /** @var IdentityTypeRepository $identityTypeRepo */
        $identityTypeRepo = App::make(IdentityTypeRepository::class);
        $theme = $this->fakeIdentityTypeData($identityTypeFields);
        return $identityTypeRepo->create($theme);
    }

    /**
     * Get fake instance of IdentityType
     *
     * @param array $identityTypeFields
     * @return IdentityType
     */
    public function fakeIdentityType($identityTypeFields = [])
    {
        return new IdentityType($this->fakeIdentityTypeData($identityTypeFields));
    }

    /**
     * Get fake data of IdentityType
     *
     * @param array $postFields
     * @return array
     */
    public function fakeIdentityTypeData($identityTypeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $identityTypeFields);
    }
}
