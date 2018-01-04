<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DtTransactionApiTest extends TestCase
{
    use MakeDtTransactionTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateDtTransaction()
    {
        $dtTransaction = $this->fakeDtTransactionData();
        $this->json('POST', '/api/v1/dtTransactions', $dtTransaction);

        $this->assertApiResponse($dtTransaction);
    }

    /**
     * @test
     */
    public function testReadDtTransaction()
    {
        $dtTransaction = $this->makeDtTransaction();
        $this->json('GET', '/api/v1/dtTransactions/'.$dtTransaction->id);

        $this->assertApiResponse($dtTransaction->toArray());
    }

    /**
     * @test
     */
    public function testUpdateDtTransaction()
    {
        $dtTransaction = $this->makeDtTransaction();
        $editedDtTransaction = $this->fakeDtTransactionData();

        $this->json('PUT', '/api/v1/dtTransactions/'.$dtTransaction->id, $editedDtTransaction);

        $this->assertApiResponse($editedDtTransaction);
    }

    /**
     * @test
     */
    public function testDeleteDtTransaction()
    {
        $dtTransaction = $this->makeDtTransaction();
        $this->json('DELETE', '/api/v1/dtTransactions/'.$dtTransaction->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/dtTransactions/'.$dtTransaction->id);

        $this->assertResponseStatus(404);
    }
}
