<?php

use App\Models\Referral;
use App\Repositories\ReferralRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReferralRepositoryTest extends TestCase
{
    use MakeReferralTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReferralRepository
     */
    protected $referralRepo;

    public function setUp()
    {
        parent::setUp();
        $this->referralRepo = App::make(ReferralRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateReferral()
    {
        $referral = $this->fakeReferralData();
        $createdReferral = $this->referralRepo->create($referral);
        $createdReferral = $createdReferral->toArray();
        $this->assertArrayHasKey('id', $createdReferral);
        $this->assertNotNull($createdReferral['id'], 'Created Referral must have id specified');
        $this->assertNotNull(Referral::find($createdReferral['id']), 'Referral with given id must be in DB');
        $this->assertModelData($referral, $createdReferral);
    }

    /**
     * @test read
     */
    public function testReadReferral()
    {
        $referral = $this->makeReferral();
        $dbReferral = $this->referralRepo->find($referral->id);
        $dbReferral = $dbReferral->toArray();
        $this->assertModelData($referral->toArray(), $dbReferral);
    }

    /**
     * @test update
     */
    public function testUpdateReferral()
    {
        $referral = $this->makeReferral();
        $fakeReferral = $this->fakeReferralData();
        $updatedReferral = $this->referralRepo->update($fakeReferral, $referral->id);
        $this->assertModelData($fakeReferral, $updatedReferral->toArray());
        $dbReferral = $this->referralRepo->find($referral->id);
        $this->assertModelData($fakeReferral, $dbReferral->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteReferral()
    {
        $referral = $this->makeReferral();
        $resp = $this->referralRepo->delete($referral->id);
        $this->assertTrue($resp);
        $this->assertNull(Referral::find($referral->id), 'Referral should not exist in DB');
    }
}
