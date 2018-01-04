<?php

use App\Models\TypeTransaction;
use App\Repositories\TypeTransactionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeTransactionRepositoryTest extends TestCase
{
    use MakeTypeTransactionTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TypeTransactionRepository
     */
    protected $typeTransactionRepo;

    public function setUp()
    {
        parent::setUp();
        $this->typeTransactionRepo = App::make(TypeTransactionRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTypeTransaction()
    {
        $typeTransaction = $this->fakeTypeTransactionData();
        $createdTypeTransaction = $this->typeTransactionRepo->create($typeTransaction);
        $createdTypeTransaction = $createdTypeTransaction->toArray();
        $this->assertArrayHasKey('id', $createdTypeTransaction);
        $this->assertNotNull($createdTypeTransaction['id'], 'Created TypeTransaction must have id specified');
        $this->assertNotNull(TypeTransaction::find($createdTypeTransaction['id']), 'TypeTransaction with given id must be in DB');
        $this->assertModelData($typeTransaction, $createdTypeTransaction);
    }

    /**
     * @test read
     */
    public function testReadTypeTransaction()
    {
        $typeTransaction = $this->makeTypeTransaction();
        $dbTypeTransaction = $this->typeTransactionRepo->find($typeTransaction->id);
        $dbTypeTransaction = $dbTypeTransaction->toArray();
        $this->assertModelData($typeTransaction->toArray(), $dbTypeTransaction);
    }

    /**
     * @test update
     */
    public function testUpdateTypeTransaction()
    {
        $typeTransaction = $this->makeTypeTransaction();
        $fakeTypeTransaction = $this->fakeTypeTransactionData();
        $updatedTypeTransaction = $this->typeTransactionRepo->update($fakeTypeTransaction, $typeTransaction->id);
        $this->assertModelData($fakeTypeTransaction, $updatedTypeTransaction->toArray());
        $dbTypeTransaction = $this->typeTransactionRepo->find($typeTransaction->id);
        $this->assertModelData($fakeTypeTransaction, $dbTypeTransaction->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTypeTransaction()
    {
        $typeTransaction = $this->makeTypeTransaction();
        $resp = $this->typeTransactionRepo->delete($typeTransaction->id);
        $this->assertTrue($resp);
        $this->assertNull(TypeTransaction::find($typeTransaction->id), 'TypeTransaction should not exist in DB');
    }
}
