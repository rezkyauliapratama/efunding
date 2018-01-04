<?php

use App\Models\IdentityType;
use App\Repositories\IdentityTypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IdentityTypeRepositoryTest extends TestCase
{
    use MakeIdentityTypeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var IdentityTypeRepository
     */
    protected $identityTypeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->identityTypeRepo = App::make(IdentityTypeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateIdentityType()
    {
        $identityType = $this->fakeIdentityTypeData();
        $createdIdentityType = $this->identityTypeRepo->create($identityType);
        $createdIdentityType = $createdIdentityType->toArray();
        $this->assertArrayHasKey('id', $createdIdentityType);
        $this->assertNotNull($createdIdentityType['id'], 'Created IdentityType must have id specified');
        $this->assertNotNull(IdentityType::find($createdIdentityType['id']), 'IdentityType with given id must be in DB');
        $this->assertModelData($identityType, $createdIdentityType);
    }

    /**
     * @test read
     */
    public function testReadIdentityType()
    {
        $identityType = $this->makeIdentityType();
        $dbIdentityType = $this->identityTypeRepo->find($identityType->id);
        $dbIdentityType = $dbIdentityType->toArray();
        $this->assertModelData($identityType->toArray(), $dbIdentityType);
    }

    /**
     * @test update
     */
    public function testUpdateIdentityType()
    {
        $identityType = $this->makeIdentityType();
        $fakeIdentityType = $this->fakeIdentityTypeData();
        $updatedIdentityType = $this->identityTypeRepo->update($fakeIdentityType, $identityType->id);
        $this->assertModelData($fakeIdentityType, $updatedIdentityType->toArray());
        $dbIdentityType = $this->identityTypeRepo->find($identityType->id);
        $this->assertModelData($fakeIdentityType, $dbIdentityType->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteIdentityType()
    {
        $identityType = $this->makeIdentityType();
        $resp = $this->identityTypeRepo->delete($identityType->id);
        $this->assertTrue($resp);
        $this->assertNull(IdentityType::find($identityType->id), 'IdentityType should not exist in DB');
    }
}
