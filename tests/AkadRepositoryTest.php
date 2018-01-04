<?php

use App\Models\Akad;
use App\Repositories\AkadRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AkadRepositoryTest extends TestCase
{
    use MakeAkadTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AkadRepository
     */
    protected $akadRepo;

    public function setUp()
    {
        parent::setUp();
        $this->akadRepo = App::make(AkadRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAkad()
    {
        $akad = $this->fakeAkadData();
        $createdAkad = $this->akadRepo->create($akad);
        $createdAkad = $createdAkad->toArray();
        $this->assertArrayHasKey('id', $createdAkad);
        $this->assertNotNull($createdAkad['id'], 'Created Akad must have id specified');
        $this->assertNotNull(Akad::find($createdAkad['id']), 'Akad with given id must be in DB');
        $this->assertModelData($akad, $createdAkad);
    }

    /**
     * @test read
     */
    public function testReadAkad()
    {
        $akad = $this->makeAkad();
        $dbAkad = $this->akadRepo->find($akad->id);
        $dbAkad = $dbAkad->toArray();
        $this->assertModelData($akad->toArray(), $dbAkad);
    }

    /**
     * @test update
     */
    public function testUpdateAkad()
    {
        $akad = $this->makeAkad();
        $fakeAkad = $this->fakeAkadData();
        $updatedAkad = $this->akadRepo->update($fakeAkad, $akad->id);
        $this->assertModelData($fakeAkad, $updatedAkad->toArray());
        $dbAkad = $this->akadRepo->find($akad->id);
        $this->assertModelData($fakeAkad, $dbAkad->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAkad()
    {
        $akad = $this->makeAkad();
        $resp = $this->akadRepo->delete($akad->id);
        $this->assertTrue($resp);
        $this->assertNull(Akad::find($akad->id), 'Akad should not exist in DB');
    }
}
