<?php

use App\Models\Borrower;
use App\Repositories\BorrowerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BorrowerRepositoryTest extends TestCase
{
    use MakeBorrowerTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var BorrowerRepository
     */
    protected $borrowerRepo;

    public function setUp()
    {
        parent::setUp();
        $this->borrowerRepo = App::make(BorrowerRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateBorrower()
    {
        $borrower = $this->fakeBorrowerData();
        $createdBorrower = $this->borrowerRepo->create($borrower);
        $createdBorrower = $createdBorrower->toArray();
        $this->assertArrayHasKey('id', $createdBorrower);
        $this->assertNotNull($createdBorrower['id'], 'Created Borrower must have id specified');
        $this->assertNotNull(Borrower::find($createdBorrower['id']), 'Borrower with given id must be in DB');
        $this->assertModelData($borrower, $createdBorrower);
    }

    /**
     * @test read
     */
    public function testReadBorrower()
    {
        $borrower = $this->makeBorrower();
        $dbBorrower = $this->borrowerRepo->find($borrower->id);
        $dbBorrower = $dbBorrower->toArray();
        $this->assertModelData($borrower->toArray(), $dbBorrower);
    }

    /**
     * @test update
     */
    public function testUpdateBorrower()
    {
        $borrower = $this->makeBorrower();
        $fakeBorrower = $this->fakeBorrowerData();
        $updatedBorrower = $this->borrowerRepo->update($fakeBorrower, $borrower->id);
        $this->assertModelData($fakeBorrower, $updatedBorrower->toArray());
        $dbBorrower = $this->borrowerRepo->find($borrower->id);
        $this->assertModelData($fakeBorrower, $dbBorrower->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteBorrower()
    {
        $borrower = $this->makeBorrower();
        $resp = $this->borrowerRepo->delete($borrower->id);
        $this->assertTrue($resp);
        $this->assertNull(Borrower::find($borrower->id), 'Borrower should not exist in DB');
    }
}
