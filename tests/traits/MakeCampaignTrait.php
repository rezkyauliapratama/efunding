<?php

use Faker\Factory as Faker;
use App\Models\Campaign;
use App\Repositories\CampaignRepository;

trait MakeCampaignTrait
{
    /**
     * Create fake instance of Campaign and save it in database
     *
     * @param array $campaignFields
     * @return Campaign
     */
    public function makeCampaign($campaignFields = [])
    {
        /** @var CampaignRepository $campaignRepo */
        $campaignRepo = App::make(CampaignRepository::class);
        $theme = $this->fakeCampaignData($campaignFields);
        return $campaignRepo->create($theme);
    }

    /**
     * Get fake instance of Campaign
     *
     * @param array $campaignFields
     * @return Campaign
     */
    public function fakeCampaign($campaignFields = [])
    {
        return new Campaign($this->fakeCampaignData($campaignFields));
    }

    /**
     * Get fake data of Campaign
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCampaignData($campaignFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'estimated_return' => $fake->randomDigitNotNull,
            'time_range' => $fake->word,
            'started_at' => $fake->word,
            'deadline' => $fake->word,
            'target_investment' => $fake->randomDigitNotNull,
            'description' => $fake->word,
            'long_description' => $fake->word,
            'image' => $fake->word,
            'akad_id' => $fake->randomDigitNotNull,
            'city_id' => $fake->randomDigitNotNull,
            'category_id' => $fake->randomDigitNotNull,
            'borrower_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $campaignFields);
    }
}
