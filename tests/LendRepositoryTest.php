<?php

use App\Models\Lend;
use App\Repositories\LendRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LendRepositoryTest extends TestCase
{
    use MakeLendTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var LendRepository
     */
    protected $lendRepo;

    public function setUp()
    {
        parent::setUp();
        $this->lendRepo = App::make(LendRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateLend()
    {
        $lend = $this->fakeLendData();
        $createdLend = $this->lendRepo->create($lend);
        $createdLend = $createdLend->toArray();
        $this->assertArrayHasKey('id', $createdLend);
        $this->assertNotNull($createdLend['id'], 'Created Lend must have id specified');
        $this->assertNotNull(Lend::find($createdLend['id']), 'Lend with given id must be in DB');
        $this->assertModelData($lend, $createdLend);
    }

    /**
     * @test read
     */
    public function testReadLend()
    {
        $lend = $this->makeLend();
        $dbLend = $this->lendRepo->find($lend->id);
        $dbLend = $dbLend->toArray();
        $this->assertModelData($lend->toArray(), $dbLend);
    }

    /**
     * @test update
     */
    public function testUpdateLend()
    {
        $lend = $this->makeLend();
        $fakeLend = $this->fakeLendData();
        $updatedLend = $this->lendRepo->update($fakeLend, $lend->id);
        $this->assertModelData($fakeLend, $updatedLend->toArray());
        $dbLend = $this->lendRepo->find($lend->id);
        $this->assertModelData($fakeLend, $dbLend->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteLend()
    {
        $lend = $this->makeLend();
        $resp = $this->lendRepo->delete($lend->id);
        $this->assertTrue($resp);
        $this->assertNull(Lend::find($lend->id), 'Lend should not exist in DB');
    }
}
