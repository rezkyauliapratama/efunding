<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReferralApiTest extends TestCase
{
    use MakeReferralTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateReferral()
    {
        $referral = $this->fakeReferralData();
        $this->json('POST', '/api/v1/referrals', $referral);

        $this->assertApiResponse($referral);
    }

    /**
     * @test
     */
    public function testReadReferral()
    {
        $referral = $this->makeReferral();
        $this->json('GET', '/api/v1/referrals/'.$referral->id);

        $this->assertApiResponse($referral->toArray());
    }

    /**
     * @test
     */
    public function testUpdateReferral()
    {
        $referral = $this->makeReferral();
        $editedReferral = $this->fakeReferralData();

        $this->json('PUT', '/api/v1/referrals/'.$referral->id, $editedReferral);

        $this->assertApiResponse($editedReferral);
    }

    /**
     * @test
     */
    public function testDeleteReferral()
    {
        $referral = $this->makeReferral();
        $this->json('DELETE', '/api/v1/referrals/'.$referral->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/referrals/'.$referral->id);

        $this->assertResponseStatus(404);
    }
}
