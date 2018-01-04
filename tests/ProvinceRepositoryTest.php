<?php

use App\Models\Province;
use App\Repositories\ProvinceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProvinceRepositoryTest extends TestCase
{
    use MakeProvinceTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProvinceRepository
     */
    protected $provinceRepo;

    public function setUp()
    {
        parent::setUp();
        $this->provinceRepo = App::make(ProvinceRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateProvince()
    {
        $province = $this->fakeProvinceData();
        $createdProvince = $this->provinceRepo->create($province);
        $createdProvince = $createdProvince->toArray();
        $this->assertArrayHasKey('id', $createdProvince);
        $this->assertNotNull($createdProvince['id'], 'Created Province must have id specified');
        $this->assertNotNull(Province::find($createdProvince['id']), 'Province with given id must be in DB');
        $this->assertModelData($province, $createdProvince);
    }

    /**
     * @test read
     */
    public function testReadProvince()
    {
        $province = $this->makeProvince();
        $dbProvince = $this->provinceRepo->find($province->id);
        $dbProvince = $dbProvince->toArray();
        $this->assertModelData($province->toArray(), $dbProvince);
    }

    /**
     * @test update
     */
    public function testUpdateProvince()
    {
        $province = $this->makeProvince();
        $fakeProvince = $this->fakeProvinceData();
        $updatedProvince = $this->provinceRepo->update($fakeProvince, $province->id);
        $this->assertModelData($fakeProvince, $updatedProvince->toArray());
        $dbProvince = $this->provinceRepo->find($province->id);
        $this->assertModelData($fakeProvince, $dbProvince->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteProvince()
    {
        $province = $this->makeProvince();
        $resp = $this->provinceRepo->delete($province->id);
        $this->assertTrue($resp);
        $this->assertNull(Province::find($province->id), 'Province should not exist in DB');
    }
}
