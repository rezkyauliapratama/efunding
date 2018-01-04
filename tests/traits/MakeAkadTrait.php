<?php

use Faker\Factory as Faker;
use App\Models\Akad;
use App\Repositories\AkadRepository;

trait MakeAkadTrait
{
    /**
     * Create fake instance of Akad and save it in database
     *
     * @param array $akadFields
     * @return Akad
     */
    public function makeAkad($akadFields = [])
    {
        /** @var AkadRepository $akadRepo */
        $akadRepo = App::make(AkadRepository::class);
        $theme = $this->fakeAkadData($akadFields);
        return $akadRepo->create($theme);
    }

    /**
     * Get fake instance of Akad
     *
     * @param array $akadFields
     * @return Akad
     */
    public function fakeAkad($akadFields = [])
    {
        return new Akad($this->fakeAkadData($akadFields));
    }

    /**
     * Get fake data of Akad
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAkadData($akadFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $akadFields);
    }
}
