<?php

use App\Models\DtTransaction;
use App\Repositories\DtTransactionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DtTransactionRepositoryTest extends TestCase
{
    use MakeDtTransactionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var DtTransactionRepository
     */
    protected $dtTransactionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->dtTransactionRepo = App::make(DtTransactionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateDtTransaction()
    {
        $dtTransaction = $this->fakeDtTransactionData();
        $createdDtTransaction = $this->dtTransactionRepo->create($dtTransaction);
        $createdDtTransaction = $createdDtTransaction->toArray();
        $this->assertArrayHasKey('id', $createdDtTransaction);
        $this->assertNotNull($createdDtTransaction['id'], 'Created DtTransaction must have id specified');
        $this->assertNotNull(DtTransaction::find($createdDtTransaction['id']), 'DtTransaction with given id must be in DB');
        $this->assertModelData($dtTransaction, $createdDtTransaction);
    }

    /**
     * @test read
     */
    public function testReadDtTransaction()
    {
        $dtTransaction = $this->makeDtTransaction();
        $dbDtTransaction = $this->dtTransactionRepo->find($dtTransaction->id);
        $dbDtTransaction = $dbDtTransaction->toArray();
        $this->assertModelData($dtTransaction->toArray(), $dbDtTransaction);
    }

    /**
     * @test update
     */
    public function testUpdateDtTransaction()
    {
        $dtTransaction = $this->makeDtTransaction();
        $fakeDtTransaction = $this->fakeDtTransactionData();
        $updatedDtTransaction = $this->dtTransactionRepo->update($fakeDtTransaction, $dtTransaction->id);
        $this->assertModelData($fakeDtTransaction, $updatedDtTransaction->toArray());
        $dbDtTransaction = $this->dtTransactionRepo->find($dtTransaction->id);
        $this->assertModelData($fakeDtTransaction, $dbDtTransaction->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteDtTransaction()
    {
        $dtTransaction = $this->makeDtTransaction();
        $resp = $this->dtTransactionRepo->delete($dtTransaction->id);
        $this->assertTrue($resp);
        $this->assertNull(DtTransaction::find($dtTransaction->id), 'DtTransaction should not exist in DB');
    }
}
