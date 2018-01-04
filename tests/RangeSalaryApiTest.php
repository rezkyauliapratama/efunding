<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RangeSalaryApiTest extends TestCase
{
    use MakeRangeSalaryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateRangeSalary()
    {
        $rangeSalary = $this->fakeRangeSalaryData();
        $this->json('POST', '/api/v1/rangeSalaries', $rangeSalary);

        $this->assertApiResponse($rangeSalary);
    }

    /**
     * @test
     */
    public function testReadRangeSalary()
    {
        $rangeSalary = $this->makeRangeSalary();
        $this->json('GET', '/api/v1/rangeSalaries/'.$rangeSalary->id);

        $this->assertApiResponse($rangeSalary->toArray());
    }

    /**
     * @test
     */
    public function testUpdateRangeSalary()
    {
        $rangeSalary = $this->makeRangeSalary();
        $editedRangeSalary = $this->fakeRangeSalaryData();

        $this->json('PUT', '/api/v1/rangeSalaries/'.$rangeSalary->id, $editedRangeSalary);

        $this->assertApiResponse($editedRangeSalary);
    }

    /**
     * @test
     */
    public function testDeleteRangeSalary()
    {
        $rangeSalary = $this->makeRangeSalary();
        $this->json('DELETE', '/api/v1/rangeSalaries/'.$rangeSalary->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/rangeSalaries/'.$rangeSalary->id);

        $this->assertResponseStatus(404);
    }
}
