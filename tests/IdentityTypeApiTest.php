<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IdentityTypeApiTest extends TestCase
{
    use MakeIdentityTypeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateIdentityType()
    {
        $identityType = $this->fakeIdentityTypeData();
        $this->json('POST', '/api/v1/identityTypes', $identityType);

        $this->assertApiResponse($identityType);
    }

    /**
     * @test
     */
    public function testReadIdentityType()
    {
        $identityType = $this->makeIdentityType();
        $this->json('GET', '/api/v1/identityTypes/'.$identityType->id);

        $this->assertApiResponse($identityType->toArray());
    }

    /**
     * @test
     */
    public function testUpdateIdentityType()
    {
        $identityType = $this->makeIdentityType();
        $editedIdentityType = $this->fakeIdentityTypeData();

        $this->json('PUT', '/api/v1/identityTypes/'.$identityType->id, $editedIdentityType);

        $this->assertApiResponse($editedIdentityType);
    }

    /**
     * @test
     */
    public function testDeleteIdentityType()
    {
        $identityType = $this->makeIdentityType();
        $this->json('DELETE', '/api/v1/identityTypes/'.$identityType->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/identityTypes/'.$identityType->id);

        $this->assertResponseStatus(404);
    }
}
