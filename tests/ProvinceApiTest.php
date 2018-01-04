<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProvinceApiTest extends TestCase
{
    use MakeProvinceTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProvince()
    {
        $province = $this->fakeProvinceData();
        $this->json('POST', '/api/v1/provinces', $province);

        $this->assertApiResponse($province);
    }

    /**
     * @test
     */
    public function testReadProvince()
    {
        $province = $this->makeProvince();
        $this->json('GET', '/api/v1/provinces/'.$province->id);

        $this->assertApiResponse($province->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProvince()
    {
        $province = $this->makeProvince();
        $editedProvince = $this->fakeProvinceData();

        $this->json('PUT', '/api/v1/provinces/'.$province->id, $editedProvince);

        $this->assertApiResponse($editedProvince);
    }

    /**
     * @test
     */
    public function testDeleteProvince()
    {
        $province = $this->makeProvince();
        $this->json('DELETE', '/api/v1/provinces/'.$province->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/provinces/'.$province->id);

        $this->assertResponseStatus(404);
    }
}
