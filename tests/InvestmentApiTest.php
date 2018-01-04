<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InvestmentApiTest extends TestCase
{
    use MakeInvestmentTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateInvestment()
    {
        $investment = $this->fakeInvestmentData();
        $this->json('POST', '/api/v1/investments', $investment);

        $this->assertApiResponse($investment);
    }

    /**
     * @test
     */
    public function testReadInvestment()
    {
        $investment = $this->makeInvestment();
        $this->json('GET', '/api/v1/investments/'.$investment->id);

        $this->assertApiResponse($investment->toArray());
    }

    /**
     * @test
     */
    public function testUpdateInvestment()
    {
        $investment = $this->makeInvestment();
        $editedInvestment = $this->fakeInvestmentData();

        $this->json('PUT', '/api/v1/investments/'.$investment->id, $editedInvestment);

        $this->assertApiResponse($editedInvestment);
    }

    /**
     * @test
     */
    public function testDeleteInvestment()
    {
        $investment = $this->makeInvestment();
        $this->json('DELETE', '/api/v1/investments/'.$investment->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/investments/'.$investment->id);

        $this->assertResponseStatus(404);
    }
}
