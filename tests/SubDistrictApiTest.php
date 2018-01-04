<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubDistrictApiTest extends TestCase
{
    use MakeSubDistrictTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateSubDistrict()
    {
        $subDistrict = $this->fakeSubDistrictData();
        $this->json('POST', '/api/v1/subDistricts', $subDistrict);

        $this->assertApiResponse($subDistrict);
    }

    /**
     * @test
     */
    public function testReadSubDistrict()
    {
        $subDistrict = $this->makeSubDistrict();
        $this->json('GET', '/api/v1/subDistricts/'.$subDistrict->id);

        $this->assertApiResponse($subDistrict->toArray());
    }

    /**
     * @test
     */
    public function testUpdateSubDistrict()
    {
        $subDistrict = $this->makeSubDistrict();
        $editedSubDistrict = $this->fakeSubDistrictData();

        $this->json('PUT', '/api/v1/subDistricts/'.$subDistrict->id, $editedSubDistrict);

        $this->assertApiResponse($editedSubDistrict);
    }

    /**
     * @test
     */
    public function testDeleteSubDistrict()
    {
        $subDistrict = $this->makeSubDistrict();
        $this->json('DELETE', '/api/v1/subDistricts/'.$subDistrict->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/subDistricts/'.$subDistrict->id);

        $this->assertResponseStatus(404);
    }
}
