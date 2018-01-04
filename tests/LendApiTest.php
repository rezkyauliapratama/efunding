<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LendApiTest extends TestCase
{
    use MakeLendTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateLend()
    {
        $lend = $this->fakeLendData();
        $this->json('POST', '/api/v1/lends', $lend);

        $this->assertApiResponse($lend);
    }

    /**
     * @test
     */
    public function testReadLend()
    {
        $lend = $this->makeLend();
        $this->json('GET', '/api/v1/lends/'.$lend->id);

        $this->assertApiResponse($lend->toArray());
    }

    /**
     * @test
     */
    public function testUpdateLend()
    {
        $lend = $this->makeLend();
        $editedLend = $this->fakeLendData();

        $this->json('PUT', '/api/v1/lends/'.$lend->id, $editedLend);

        $this->assertApiResponse($editedLend);
    }

    /**
     * @test
     */
    public function testDeleteLend()
    {
        $lend = $this->makeLend();
        $this->json('DELETE', '/api/v1/lends/'.$lend->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/lends/'.$lend->id);

        $this->assertResponseStatus(404);
    }
}
