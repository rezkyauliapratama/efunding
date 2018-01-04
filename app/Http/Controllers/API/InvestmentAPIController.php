<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInvestmentAPIRequest;
use App\Http\Requests\API\UpdateInvestmentAPIRequest;
use App\Models\Investment;
use App\Repositories\InvestmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InvestmentController
 * @package App\Http\Controllers\API
 */

class InvestmentAPIController extends AppBaseController
{
    /** @var  InvestmentRepository */
    private $investmentRepository;

    public function __construct(InvestmentRepository $investmentRepo)
    {
        $this->investmentRepository = $investmentRepo;
    }

    /**
     * Display a listing of the Investment.
     * GET|HEAD /investments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->investmentRepository->pushCriteria(new RequestCriteria($request));
        $this->investmentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $investments = $this->investmentRepository->all();

        return $this->sendResponse($investments->toArray(), 'Investments retrieved successfully');
    }

    /**
     * Store a newly created Investment in storage.
     * POST /investments
     *
     * @param CreateInvestmentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateInvestmentAPIRequest $request)
    {
        $input = $request->all();

        $investments = $this->investmentRepository->create($input);

        return $this->sendResponse($investments->toArray(), 'Investment saved successfully');
    }

    /**
     * Display the specified Investment.
     * GET|HEAD /investments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Investment $investment */
        $investment = $this->investmentRepository->findWithoutFail($id);

        if (empty($investment)) {
            return $this->sendError('Investment not found');
        }

        return $this->sendResponse($investment->toArray(), 'Investment retrieved successfully');
    }

    /**
     * Update the specified Investment in storage.
     * PUT/PATCH /investments/{id}
     *
     * @param  int $id
     * @param UpdateInvestmentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvestmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Investment $investment */
        $investment = $this->investmentRepository->findWithoutFail($id);

        if (empty($investment)) {
            return $this->sendError('Investment not found');
        }

        $investment = $this->investmentRepository->update($input, $id);

        return $this->sendResponse($investment->toArray(), 'Investment updated successfully');
    }

    /**
     * Remove the specified Investment from storage.
     * DELETE /investments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Investment $investment */
        $investment = $this->investmentRepository->findWithoutFail($id);

        if (empty($investment)) {
            return $this->sendError('Investment not found');
        }

        $investment->delete();

        return $this->sendResponse($id, 'Investment deleted successfully');
    }
}
