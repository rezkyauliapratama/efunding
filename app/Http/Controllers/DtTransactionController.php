<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDtTransactionRequest;
use App\Http\Requests\UpdateDtTransactionRequest;
use App\Repositories\DtTransactionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DtTransactionController extends AppBaseController
{
    /** @var  DtTransactionRepository */
    private $dtTransactionRepository;

    public function __construct(DtTransactionRepository $dtTransactionRepo)
    {
        $this->dtTransactionRepository = $dtTransactionRepo;
    }

    /**
     * Display a listing of the DtTransaction.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dtTransactionRepository->pushCriteria(new RequestCriteria($request));
        $dtTransactions = $this->dtTransactionRepository->all();

        return view('dt_transactions.index')
            ->with('dtTransactions', $dtTransactions);
    }

    /**
     * Show the form for creating a new DtTransaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('dt_transactions.create');
    }

    /**
     * Store a newly created DtTransaction in storage.
     *
     * @param CreateDtTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateDtTransactionRequest $request)
    {
        $input = $request->all();

        $dtTransaction = $this->dtTransactionRepository->create($input);

        Flash::success('Dt Transaction saved successfully.');

        return redirect(route('dtTransactions.index'));
    }

    /**
     * Display the specified DtTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dtTransaction = $this->dtTransactionRepository->findWithoutFail($id);

        if (empty($dtTransaction)) {
            Flash::error('Dt Transaction not found');

            return redirect(route('dtTransactions.index'));
        }

        return view('dt_transactions.show')->with('dtTransaction', $dtTransaction);
    }

    /**
     * Show the form for editing the specified DtTransaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dtTransaction = $this->dtTransactionRepository->findWithoutFail($id);

        if (empty($dtTransaction)) {
            Flash::error('Dt Transaction not found');

            return redirect(route('dtTransactions.index'));
        }

        return view('dt_transactions.edit')->with('dtTransaction', $dtTransaction);
    }

    /**
     * Update the specified DtTransaction in storage.
     *
     * @param  int              $id
     * @param UpdateDtTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDtTransactionRequest $request)
    {
        $dtTransaction = $this->dtTransactionRepository->findWithoutFail($id);

        if (empty($dtTransaction)) {
            Flash::error('Dt Transaction not found');

            return redirect(route('dtTransactions.index'));
        }

        $dtTransaction = $this->dtTransactionRepository->update($request->all(), $id);

        Flash::success('Dt Transaction updated successfully.');

        return redirect(route('dtTransactions.index'));
    }

    /**
     * Remove the specified DtTransaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dtTransaction = $this->dtTransactionRepository->findWithoutFail($id);

        if (empty($dtTransaction)) {
            Flash::error('Dt Transaction not found');

            return redirect(route('dtTransactions.index'));
        }

        $this->dtTransactionRepository->delete($id);

        Flash::success('Dt Transaction deleted successfully.');

        return redirect(route('dtTransactions.index'));
    }
}
