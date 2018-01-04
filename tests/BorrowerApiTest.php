<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BorrowerApiTest extends TestCase
{
    use MakeBorrowerTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateBorrower()
    {
        $borrower = $this->fakeBorrowerData();
        $this->json('POST', '/api/v1/borrowers', $borrower);

        $this->assertApiResponse($borrower);
    }

    /**
     * @test
     */
    public function testReadBorrower()
    {
        $borrower = $this->makeBorrower();
        $this->json('GET', '/api/v1/borrowers/'.$borrower->id);

        $this->assertApiResponse($borrower->toArray());
    }

    /**
     * @test
     */
    public function testUpdateBorrower()
    {
        $borrower = $this->makeBorrower();
        $editedBorrower = $this->fakeBorrowerData();

        $this->json('PUT', '/api/v1/borrowers/'.$borrower->id, $editedBorrower);

        $this->assertApiResponse($editedBorrower);
    }

    /**
     * @test
     */
    public function testDeleteBorrower()
    {
        $borrower = $this->makeBorrower();
        $this->json('DELETE', '/api/v1/borrowers/'.$borrower->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/borrowers/'.$borrower->id);

        $this->assertResponseStatus(404);
    }
}
