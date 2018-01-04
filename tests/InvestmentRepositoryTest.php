<?php

use App\Models\Investment;
use App\Repositories\InvestmentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvestmentRepositoryTest extends TestCase
{
    use MakeInvestmentTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var InvestmentRepository
     */
    protected $investmentRepo;

    public function setUp()
    {
        parent::setUp();
        $this->investmentRepo = App::make(InvestmentRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateInvestment()
    {
        $investment = $this->fakeInvestmentData();
        $createdInvestment = $this->investmentRepo->create($investment);
        $createdInvestment = $createdInvestment->toArray();
        $this->assertArrayHasKey('id', $createdInvestment);
        $this->assertNotNull($createdInvestment['id'], 'Created Investment must have id specified');
        $this->assertNotNull(Investment::find($createdInvestment['id']), 'Investment with given id must be in DB');
        $this->assertModelData($investment, $createdInvestment);
    }

    /**
     * @test read
     */
    public function testReadInvestment()
    {
        $investment = $this->makeInvestment();
        $dbInvestment = $this->investmentRepo->find($investment->id);
        $dbInvestment = $dbInvestment->toArray();
        $this->assertModelData($investment->toArray(), $dbInvestment);
    }

    /**
     * @test update
     */
    public function testUpdateInvestment()
    {
        $investment = $this->makeInvestment();
        $fakeInvestment = $this->fakeInvestmentData();
        $updatedInvestment = $this->investmentRepo->update($fakeInvestment, $investment->id);
        $this->assertModelData($fakeInvestment, $updatedInvestment->toArray());
        $dbInvestment = $this->investmentRepo->find($investment->id);
        $this->assertModelData($fakeInvestment, $dbInvestment->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteInvestment()
    {
        $investment = $this->makeInvestment();
        $resp = $this->investmentRepo->delete($investment->id);
        $this->assertTrue($resp);
        $this->assertNull(Investment::find($investment->id), 'Investment should not exist in DB');
    }
}
