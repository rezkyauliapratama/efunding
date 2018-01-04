<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTypeTransactionAPIRequest;
use App\Http\Requests\API\UpdateTypeTransactionAPIRequest;
use App\Models\TypeTransaction;
use App\Repositories\TypeTransactionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TypeTransactionController
 * @package App\Http\Controllers\API
 */

class TypeTransactionAPIController extends AppBaseController
{
    /** @var  TypeTransactionRepository */
    private $typeTransactionRepository;

    public function __construct(TypeTransactionRepository $typeTransactionRepo)
    {
        $this->typeTransactionRepository = $typeTransactionRepo;
    }

    /**
     * Display a listing of the TypeTransaction.
     * GET|HEAD /typeTransactions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typeTransactionRepository->pushCriteria(new RequestCriteria($request));
        $this->typeTransactionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $typeTransactions = $this->typeTransactionRepository->all();

        return $this->sendResponse($typeTransactions->toArray(), 'Type Transactions retrieved successfully');
    }

    /**
     * Store a newly created TypeTransaction in storage.
     * POST /typeTransactions
     *
     * @param CreateTypeTransactionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeTransactionAPIRequest $request)
    {
        $input = $request->all();

        $typeTransactions = $this->typeTransactionRepository->create($input);

        return $this->sendResponse($typeTransactions->toArray(), 'Type Transaction saved successfully');
    }

    /**
     * Display the specified TypeTransaction.
     * GET|HEAD /typeTransactions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TypeTransaction $typeTransaction */
        $typeTransaction = $this->typeTransactionRepository->findWithoutFail($id);

        if (empty($typeTransaction)) {
            return $this->sendError('Type Transaction not found');
        }

        return $this->sendResponse($typeTransaction->toArray(), 'Type Transaction retrieved successfully');
    }

    /**
     * Update the specified TypeTransaction in storage.
     * PUT/PATCH /typeTransactions/{id}
     *
     * @param  int $id
     * @param UpdateTypeTransactionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeTransactionAPIRequest $request)
    {
        $input = $request->all();

        /** @var TypeTransaction $typeTransaction */
        $typeTransaction = $this->typeTransactionRepository->findWithoutFail($id);

        if (empty($typeTransaction)) {
            return $this->sendError('Type Transaction not found');
        }

        $typeTransaction = $this->typeTransactionRepository->update($input, $id);

        return $this->sendResponse($typeTransaction->toArray(), 'TypeTransaction updated successfully');
    }

    /**
     * Remove the specified TypeTransaction from storage.
     * DELETE /typeTransactions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TypeTransaction $typeTransaction */
        $typeTransaction = $this->typeTransactionRepository->findWithoutFail($id);

        if (empty($typeTransaction)) {
            return $this->sendError('Type Transaction not found');
        }

        $typeTransaction->delete();

        return $this->sendResponse($id, 'Type Transaction deleted successfully');
    }
}
