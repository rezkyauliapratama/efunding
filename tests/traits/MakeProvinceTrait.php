<?php

use Faker\Factory as Faker;
use App\Models\Province;
use App\Repositories\ProvinceRepository;

trait MakeProvinceTrait
{
    /**
     * Create fake instance of Province and save it in database
     *
     * @param array $provinceFields
     * @return Province
     */
    public function makeProvince($provinceFields = [])
    {
        /** @var ProvinceRepository $provinceRepo */
        $provinceRepo = App::make(ProvinceRepository::class);
        $theme = $this->fakeProvinceData($provinceFields);
        return $provinceRepo->create($theme);
    }

    /**
     * Get fake instance of Province
     *
     * @param array $provinceFields
     * @return Province
     */
    public function fakeProvince($provinceFields = [])
    {
        return new Province($this->fakeProvinceData($provinceFields));
    }

    /**
     * Get fake data of Province
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProvinceData($provinceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'name' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $provinceFields);
    }
}
