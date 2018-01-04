<?php

use App\Models\UrbanVillage;
use App\Repositories\UrbanVillageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UrbanVillageRepositoryTest extends TestCase
{
    use MakeUrbanVillageTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var UrbanVillageRepository
     */
    protected $urbanVillageRepo;

    public function setUp()
    {
        parent::setUp();
        $this->urbanVillageRepo = App::make(UrbanVillageRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateUrbanVillage()
    {
        $urbanVillage = $this->fakeUrbanVillageData();
        $createdUrbanVillage = $this->urbanVillageRepo->create($urbanVillage);
        $createdUrbanVillage = $createdUrbanVillage->toArray();
        $this->assertArrayHasKey('id', $createdUrbanVillage);
        $this->assertNotNull($createdUrbanVillage['id'], 'Created UrbanVillage must have id specified');
        $this->assertNotNull(UrbanVillage::find($createdUrbanVillage['id']), 'UrbanVillage with given id must be in DB');
        $this->assertModelData($urbanVillage, $createdUrbanVillage);
    }

    /**
     * @test read
     */
    public function testReadUrbanVillage()
    {
        $urbanVillage = $this->makeUrbanVillage();
        $dbUrbanVillage = $this->urbanVillageRepo->find($urbanVillage->id);
        $dbUrbanVillage = $dbUrbanVillage->toArray();
        $this->assertModelData($urbanVillage->toArray(), $dbUrbanVillage);
    }

    /**
     * @test update
     */
    public function testUpdateUrbanVillage()
    {
        $urbanVillage = $this->makeUrbanVillage();
        $fakeUrbanVillage = $this->fakeUrbanVillageData();
        $updatedUrbanVillage = $this->urbanVillageRepo->update($fakeUrbanVillage, $urbanVillage->id);
        $this->assertModelData($fakeUrbanVillage, $updatedUrbanVillage->toArray());
        $dbUrbanVillage = $this->urbanVillageRepo->find($urbanVillage->id);
        $this->assertModelData($fakeUrbanVillage, $dbUrbanVillage->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteUrbanVillage()
    {
        $urbanVillage = $this->makeUrbanVillage();
        $resp = $this->urbanVillageRepo->delete($urbanVillage->id);
        $this->assertTrue($resp);
        $this->assertNull(UrbanVillage::find($urbanVillage->id), 'UrbanVillage should not exist in DB');
    }
}
