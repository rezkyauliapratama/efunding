<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTypeTransactionRequest;
use App\Http\Requests\UpdateTypeTransactionRequest;
use App\Repositories\TypeTransactionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TypeTransactionController extends AppBaseController
{
    /** @var  TypeTransactionRepository */
    private $typeTransactionRepository;

    public function __construct(TypeTransactionRepository $typeTransactionRepo)
    {
        $this->typeTransactionRepository = $typeTransactionRepo;
    }

    /**
     * Display a listing of the TypeTransaction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->typeTransactionRepository->pushCriteria(new RequestCriteria($request));
        $typeTransactions = $this->typeTransactionRepository->all();

        return view('type_transactions.index')
            ->with('typeTransactions', $typeTransactions);
    }

    /**
     * Show the form for creating a new TypeTransaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('type_transactions.create');
    }

    /**
     * Store a newly created TypeTransaction in storage.
     *
     * @param CreateTypeTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTypeTransactionRequest $request)
    {
        $input = $request->all();

        $typeTransaction = $this->typeTransactionRepository->create($input);

        Flash::success('Type Transaction saved successfully.');

        return redirect(route('typeTransactions.index'));
    }

    /**
     * Display the specified TypeTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeTransaction = $this->typeTransactionRepository->findWithoutFail($id);

        if (empty($typeTransaction)) {
            Flash::error('Type Transaction not found');

            return redirect(route('typeTransactions.index'));
        }

        return view('type_transactions.show')->with('typeTransaction', $typeTransaction);
    }

    /**
     * Show the form for editing the specified TypeTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeTransaction = $this->typeTransactionRepository->findWithoutFail($id);

        if (empty($typeTransaction)) {
            Flash::error('Type Transaction not found');

            return redirect(route('typeTransactions.index'));
        }

        return view('type_transactions.edit')->with('typeTransaction', $typeTransaction);
    }

    /**
     * Update the specified TypeTransaction in storage.
     *
     * @param  int              $id
     * @param UpdateTypeTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTypeTransactionRequest $request)
    {
        $typeTransaction = $this->typeTransactionRepository->findWithoutFail($id);

        if (empty($typeTransaction)) {
            Flash::error('Type Transaction not found');

            return redirect(route('typeTransactions.index'));
        }

        $typeTransaction = $this->typeTransactionRepository->update($request->all(), $id);

        Flash::success('Type Transaction updated successfully.');

        return redirect(route('typeTransactions.index'));
    }

    /**
     * Remove the specified TypeTransaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeTransaction = $this->typeTransactionRepository->findWithoutFail($id);

        if (empty($typeTransaction)) {
            Flash::error('Type Transaction not found');

            return redirect(route('typeTransactions.index'));
        }

        $this->typeTransactionRepository->delete($id);

        Flash::success('Type Transaction deleted successfully.');

        return redirect(route('typeTransactions.index'));
    }
}
