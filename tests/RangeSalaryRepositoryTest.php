<?php

use App\Models\RangeSalary;
use App\Repositories\RangeSalaryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RangeSalaryRepositoryTest extends TestCase
{
    use MakeRangeSalaryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var RangeSalaryRepository
     */
    protected $rangeSalaryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->rangeSalaryRepo = App::make(RangeSalaryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateRangeSalary()
    {
        $rangeSalary = $this->fakeRangeSalaryData();
        $createdRangeSalary = $this->rangeSalaryRepo->create($rangeSalary);
        $createdRangeSalary = $createdRangeSalary->toArray();
        $this->assertArrayHasKey('id', $createdRangeSalary);
        $this->assertNotNull($createdRangeSalary['id'], 'Created RangeSalary must have id specified');
        $this->assertNotNull(RangeSalary::find($createdRangeSalary['id']), 'RangeSalary with given id must be in DB');
        $this->assertModelData($rangeSalary, $createdRangeSalary);
    }

    /**
     * @test read
     */
    public function testReadRangeSalary()
    {
        $rangeSalary = $this->makeRangeSalary();
        $dbRangeSalary = $this->rangeSalaryRepo->find($rangeSalary->id);
        $dbRangeSalary = $dbRangeSalary->toArray();
        $this->assertModelData($rangeSalary->toArray(), $dbRangeSalary);
    }

    /**
     * @test update
     */
    public function testUpdateRangeSalary()
    {
        $rangeSalary = $this->makeRangeSalary();
        $fakeRangeSalary = $this->fakeRangeSalaryData();
        $updatedRangeSalary = $this->rangeSalaryRepo->update($fakeRangeSalary, $rangeSalary->id);
        $this->assertModelData($fakeRangeSalary, $updatedRangeSalary->toArray());
        $dbRangeSalary = $this->rangeSalaryRepo->find($rangeSalary->id);
        $this->assertModelData($fakeRangeSalary, $dbRangeSalary->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteRangeSalary()
    {
        $rangeSalary = $this->makeRangeSalary();
        $resp = $this->rangeSalaryRepo->delete($rangeSalary->id);
        $this->assertTrue($resp);
        $this->assertNull(RangeSalary::find($rangeSalary->id), 'RangeSalary should not exist in DB');
    }
}
