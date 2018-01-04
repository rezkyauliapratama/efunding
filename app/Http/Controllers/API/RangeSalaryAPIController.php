<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRangeSalaryAPIRequest;
use App\Http\Requests\API\UpdateRangeSalaryAPIRequest;
use App\Models\RangeSalary;
use App\Repositories\RangeSalaryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RangeSalaryController
 * @package App\Http\Controllers\API
 */

class RangeSalaryAPIController extends AppBaseController
{
    /** @var  RangeSalaryRepository */
    private $rangeSalaryRepository;

    public function __construct(RangeSalaryRepository $rangeSalaryRepo)
    {
        $this->rangeSalaryRepository = $rangeSalaryRepo;
    }

    /**
     * Display a listing of the RangeSalary.
     * GET|HEAD /rangeSalaries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rangeSalaryRepository->pushCriteria(new RequestCriteria($request));
        $this->rangeSalaryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rangeSalaries = $this->rangeSalaryRepository->all();

        return $this->sendResponse($rangeSalaries->toArray(), 'Range Salaries retrieved successfully');
    }

    /**
     * Store a newly created RangeSalary in storage.
     * POST /rangeSalaries
     *
     * @param CreateRangeSalaryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRangeSalaryAPIRequest $request)
    {
        $input = $request->all();

        $rangeSalaries = $this->rangeSalaryRepository->create($input);

        return $this->sendResponse($rangeSalaries->toArray(), 'Range Salary saved successfully');
    }

    /**
     * Display the specified RangeSalary.
     * GET|HEAD /rangeSalaries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RangeSalary $rangeSalary */
        $rangeSalary = $this->rangeSalaryRepository->findWithoutFail($id);

        if (empty($rangeSalary)) {
            return $this->sendError('Range Salary not found');
        }

        return $this->sendResponse($rangeSalary->toArray(), 'Range Salary retrieved successfully');
    }

    /**
     * Update the specified RangeSalary in storage.
     * PUT/PATCH /rangeSalaries/{id}
     *
     * @param  int $id
     * @param UpdateRangeSalaryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRangeSalaryAPIRequest $request)
    {
        $input = $request->all();

        /** @var RangeSalary $rangeSalary */
        $rangeSalary = $this->rangeSalaryRepository->findWithoutFail($id);

        if (empty($rangeSalary)) {
            return $this->sendError('Range Salary not found');
        }

        $rangeSalary = $this->rangeSalaryRepository->update($input, $id);

        return $this->sendResponse($rangeSalary->toArray(), 'RangeSalary updated successfully');
    }

    /**
     * Remove the specified RangeSalary from storage.
     * DELETE /rangeSalaries/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RangeSalary $rangeSalary */
        $rangeSalary = $this->rangeSalaryRepository->findWithoutFail($id);

        if (empty($rangeSalary)) {
            return $this->sendError('Range Salary not found');
        }

        $rangeSalary->delete();

        return $this->sendResponse($id, 'Range Salary deleted successfully');
    }
}
