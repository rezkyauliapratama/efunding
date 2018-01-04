<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDtTransactionAPIRequest;
use App\Http\Requests\API\UpdateDtTransactionAPIRequest;
use App\Models\DtTransaction;
use App\Repositories\DtTransactionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DtTransactionController
 * @package App\Http\Controllers\API
 */

class DtTransactionAPIController extends AppBaseController
{
    /** @var  DtTransactionRepository */
    private $dtTransactionRepository;

    public function __construct(DtTransactionRepository $dtTransactionRepo)
    {
        $this->dtTransactionRepository = $dtTransactionRepo;
    }

    /**
     * Display a listing of the DtTransaction.
     * GET|HEAD /dtTransactions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dtTransactionRepository->pushCriteria(new RequestCriteria($request));
        $this->dtTransactionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dtTransactions = $this->dtTransactionRepository->all();

        return $this->sendResponse($dtTransactions->toArray(), 'Dt Transactions retrieved successfully');
    }

    /**
     * Store a newly created DtTransaction in storage.
     * POST /dtTransactions
     *
     * @param CreateDtTransactionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDtTransactionAPIRequest $request)
    {
        $input = $request->all();

        $dtTransactions = $this->dtTransactionRepository->create($input);

        return $this->sendResponse($dtTransactions->toArray(), 'Dt Transaction saved successfully');
    }

    /**
     * Display the specified DtTransaction.
     * GET|HEAD /dtTransactions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DtTransaction $dtTransaction */
        $dtTransaction = $this->dtTransactionRepository->findWithoutFail($id);

        if (empty($dtTransaction)) {
            return $this->sendError('Dt Transaction not found');
        }

        return $this->sendResponse($dtTransaction->toArray(), 'Dt Transaction retrieved successfully');
    }

    /**
     * Update the specified DtTransaction in storage.
     * PUT/PATCH /dtTransactions/{id}
     *
     * @param  int $id
     * @param UpdateDtTransactionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDtTransactionAPIRequest $request)
    {
        $input = $request->all();

        /** @var DtTransaction $dtTransaction */
        $dtTransaction = $this->dtTransactionRepository->findWithoutFail($id);

        if (empty($dtTransaction)) {
            return $this->sendError('Dt Transaction not found');
        }

        $dtTransaction = $this->dtTransactionRepository->update($input, $id);

        return $this->sendResponse($dtTransaction->toArray(), 'DtTransaction updated successfully');
    }

    /**
     * Remove the specified DtTransaction from storage.
     * DELETE /dtTransactions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DtTransaction $dtTransaction */
        $dtTransaction = $this->dtTransactionRepository->findWithoutFail($id);

        if (empty($dtTransaction)) {
            return $this->sendError('Dt Transaction not found');
        }

        $dtTransaction->delete();

        return $this->sendResponse($id, 'Dt Transaction deleted successfully');
    }
}
