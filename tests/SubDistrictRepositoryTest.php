<?php

use App\Models\SubDistrict;
use App\Repositories\SubDistrictRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubDistrictRepositoryTest extends TestCase
{
    use MakeSubDistrictTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubDistrictRepository
     */
    protected $subDistrictRepo;

    public function setUp()
    {
        parent::setUp();
        $this->subDistrictRepo = App::make(SubDistrictRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateSubDistrict()
    {
        $subDistrict = $this->fakeSubDistrictData();
        $createdSubDistrict = $this->subDistrictRepo->create($subDistrict);
        $createdSubDistrict = $createdSubDistrict->toArray();
        $this->assertArrayHasKey('id', $createdSubDistrict);
        $this->assertNotNull($createdSubDistrict['id'], 'Created SubDistrict must have id specified');
        $this->assertNotNull(SubDistrict::find($createdSubDistrict['id']), 'SubDistrict with given id must be in DB');
        $this->assertModelData($subDistrict, $createdSubDistrict);
    }

    /**
     * @test read
     */
    public function testReadSubDistrict()
    {
        $subDistrict = $this->makeSubDistrict();
        $dbSubDistrict = $this->subDistrictRepo->find($subDistrict->id);
        $dbSubDistrict = $dbSubDistrict->toArray();
        $this->assertModelData($subDistrict->toArray(), $dbSubDistrict);
    }

    /**
     * @test update
     */
    public function testUpdateSubDistrict()
    {
        $subDistrict = $this->makeSubDistrict();
        $fakeSubDistrict = $this->fakeSubDistrictData();
        $updatedSubDistrict = $this->subDistrictRepo->update($fakeSubDistrict, $subDistrict->id);
        $this->assertModelData($fakeSubDistrict, $updatedSubDistrict->toArray());
        $dbSubDistrict = $this->subDistrictRepo->find($subDistrict->id);
        $this->assertModelData($fakeSubDistrict, $dbSubDistrict->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteSubDistrict()
    {
        $subDistrict = $this->makeSubDistrict();
        $resp = $this->subDistrictRepo->delete($subDistrict->id);
        $this->assertTrue($resp);
        $this->assertNull(SubDistrict::find($subDistrict->id), 'SubDistrict should not exist in DB');
    }
}
