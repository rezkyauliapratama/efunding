<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBankAPIRequest;
use App\Http\Requests\API\UpdateBankAPIRequest;
use App\Models\Bank;
use App\Repositories\BankRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BankController
 * @package App\Http\Controllers\API
 */

class BankAPIController extends AppBaseController
{
    /** @var  BankRepository */
    private $bankRepository;

    public function __construct(BankRepository $bankRepo)
    {
        $this->bankRepository = $bankRepo;
    }

    /**
     * Display a listing of the Bank.
     * GET|HEAD /banks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->bankRepository->pushCriteria(new RequestCriteria($request));
        $this->bankRepository->pushCriteria(new LimitOffsetCriteria($request));
        $banks = $this->bankRepository->all();

        return $this->sendResponse($banks->toArray(), 'Banks retrieved successfully');
    }

    /**
     * Store a newly created Bank in storage.
     * POST /banks
     *
     * @param CreateBankAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBankAPIRequest $request)
    {
        $input = $request->all();

        $banks = $this->bankRepository->create($input);

        return $this->sendResponse($banks->toArray(), 'Bank saved successfully');
    }

    /**
     * Display the specified Bank.
     * GET|HEAD /banks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Bank $bank */
        $bank = $this->bankRepository->findWithoutFail($id);

        if (empty($bank)) {
            return $this->sendError('Bank not found');
        }

        return $this->sendResponse($bank->toArray(), 'Bank retrieved successfully');
    }

    /**
     * Update the specified Bank in storage.
     * PUT/PATCH /banks/{id}
     *
     * @param  int $id
     * @param UpdateBankAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBankAPIRequest $request)
    {
        $input = $request->all();

        /** @var Bank $bank */
        $bank = $this->bankRepository->findWithoutFail($id);

        if (empty($bank)) {
            return $this->sendError('Bank not found');
        }

        $bank = $this->bankRepository->update($input, $id);

        return $this->sendResponse($bank->toArray(), 'Bank updated successfully');
    }

    /**
     * Remove the specified Bank from storage.
     * DELETE /banks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Bank $bank */
        $bank = $this->bankRepository->findWithoutFail($id);

        if (empty($bank)) {
            return $this->sendError('Bank not found');
        }

        $bank->delete();

        return $this->sendResponse($id, 'Bank deleted successfully');
    }
}
