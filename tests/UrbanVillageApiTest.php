<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UrbanVillageApiTest extends TestCase
{
    use MakeUrbanVillageTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateUrbanVillage()
    {
        $urbanVillage = $this->fakeUrbanVillageData();
        $this->json('POST', '/api/v1/urbanVillages', $urbanVillage);

        $this->assertApiResponse($urbanVillage);
    }

    /**
     * @test
     */
    public function testReadUrbanVillage()
    {
        $urbanVillage = $this->makeUrbanVillage();
        $this->json('GET', '/api/v1/urbanVillages/'.$urbanVillage->id);

        $this->assertApiResponse($urbanVillage->toArray());
    }

    /**
     * @test
     */
    public function testUpdateUrbanVillage()
    {
        $urbanVillage = $this->makeUrbanVillage();
        $editedUrbanVillage = $this->fakeUrbanVillageData();

        $this->json('PUT', '/api/v1/urbanVillages/'.$urbanVillage->id, $editedUrbanVillage);

        $this->assertApiResponse($editedUrbanVillage);
    }

    /**
     * @test
     */
    public function testDeleteUrbanVillage()
    {
        $urbanVillage = $this->makeUrbanVillage();
        $this->json('DELETE', '/api/v1/urbanVillages/'.$urbanVillage->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/urbanVillages/'.$urbanVillage->id);

        $this->assertResponseStatus(404);
    }
}
