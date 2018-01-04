<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeTransactionApiTest extends TestCase
{
    use MakeTypeTransactionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTypeTransaction()
    {
        $typeTransaction = $this->fakeTypeTransactionData();
        $this->json('POST', '/api/v1/typeTransactions', $typeTransaction);

        $this->assertApiResponse($typeTransaction);
    }

    /**
     * @test
     */
    public function testReadTypeTransaction()
    {
        $typeTransaction = $this->makeTypeTransaction();
        $this->json('GET', '/api/v1/typeTransactions/'.$typeTransaction->id);

        $this->assertApiResponse($typeTransaction->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTypeTransaction()
    {
        $typeTransaction = $this->makeTypeTransaction();
        $editedTypeTransaction = $this->fakeTypeTransactionData();

        $this->json('PUT', '/api/v1/typeTransactions/'.$typeTransaction->id, $editedTypeTransaction);

        $this->assertApiResponse($editedTypeTransaction);
    }

    /**
     * @test
     */
    public function testDeleteTypeTransaction()
    {
        $typeTransaction = $this->makeTypeTransaction();
        $this->json('DELETE', '/api/v1/typeTransactions/'.$typeTransaction->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/typeTransactions/'.$typeTransaction->id);

        $this->assertResponseStatus(404);
    }
}
