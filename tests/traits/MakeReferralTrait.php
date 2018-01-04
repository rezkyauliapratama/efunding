<?php

use Faker\Factory as Faker;
use App\Models\Referral;
use App\Repositories\ReferralRepository;

trait MakeReferralTrait
{
    /**
     * Create fake instance of Referral and save it in database
     *
     * @param array $referralFields
     * @return Referral
     */
    public function makeReferral($referralFields = [])
    {
        /** @var ReferralRepository $referralRepo */
        $referralRepo = App::make(ReferralRepository::class);
        $theme = $this->fakeReferralData($referralFields);
        return $referralRepo->create($theme);
    }

    /**
     * Get fake instance of Referral
     *
     * @param array $referralFields
     * @return Referral
     */
    public function fakeReferral($referralFields = [])
    {
        return new Referral($this->fakeReferralData($referralFields));
    }

    /**
     * Get fake data of Referral
     *
     * @param array $postFields
     * @return array
     */
    public function fakeReferralData($referralFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $referralFields);
    }
}
