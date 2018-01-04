<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AkadApiTest extends TestCase
{
    use MakeAkadTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAkad()
    {
        $akad = $this->fakeAkadData();
        $this->json('POST', '/api/v1/akads', $akad);

        $this->assertApiResponse($akad);
    }

    /**
     * @test
     */
    public function testReadAkad()
    {
        $akad = $this->makeAkad();
        $this->json('GET', '/api/v1/akads/'.$akad->id);

        $this->assertApiResponse($akad->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAkad()
    {
        $akad = $this->makeAkad();
        $editedAkad = $this->fakeAkadData();

        $this->json('PUT', '/api/v1/akads/'.$akad->id, $editedAkad);

        $this->assertApiResponse($editedAkad);
    }

    /**
     * @test
     */
    public function testDeleteAkad()
    {
        $akad = $this->makeAkad();
        $this->json('DELETE', '/api/v1/akads/'.$akad->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/akads/'.$akad->id);

        $this->assertResponseStatus(404);
    }
}
