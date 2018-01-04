<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBorrowerRequest;
use App\Http\Requests\UpdateBorrowerRequest;
use App\Repositories\BorrowerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BorrowerController extends AppBaseController
{
    /** @var  BorrowerRepository */
    private $borrowerRepository;

    public function __construct(BorrowerRepository $borrowerRepo)
    {
        $this->borrowerRepository = $borrowerRepo;
    }

    /**
     * Display a listing of the Borrower.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->borrowerRepository->pushCriteria(new RequestCriteria($request));
        $borrowers = $this->borrowerRepository->all();

        return view('borrowers.index')
            ->with('borrowers', $borrowers);
    }

    /**
     * Show the form for creating a new Borrower.
     *
     * @return Response
     */
    public function create()
    {
        return view('borrowers.create');
    }

    /**
     * Store a newly created Borrower in storage.
     *
     * @param CreateBorrowerRequest $request
     *
     * @return Response
     */
    public function store(CreateBorrowerRequest $request)
    {
        $input = $request->all();

        $borrower = $this->borrowerRepository->create($input);

        Flash::success('Borrower saved successfully.');

        return redirect(route('borrowers.index'));
    }

    /**
     * Display the specified Borrower.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $borrower = $this->borrowerRepository->findWithoutFail($id);

        if (empty($borrower)) {
            Flash::error('Borrower not found');

            return redirect(route('borrowers.index'));
        }

        return view('borrowers.show')->with('borrower', $borrower);
    }

    /**
     * Show the form for editing the specified Borrower.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $borrower = $this->borrowerRepository->findWithoutFail($id);

        if (empty($borrower)) {
            Flash::error('Borrower not found');

            return redirect(route('borrowers.index'));
        }

        return view('borrowers.edit')->with('borrower', $borrower);
    }

    /**
     * Update the specified Borrower in storage.
     *
     * @param  int              $id
     * @param UpdateBorrowerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBorrowerRequest $request)
    {
        $borrower = $this->borrowerRepository->findWithoutFail($id);

        if (empty($borrower)) {
            Flash::error('Borrower not found');

            return redirect(route('borrowers.index'));
        }

        $borrower = $this->borrowerRepository->update($request->all(), $id);

        Flash::success('Borrower updated successfully.');

        return redirect(route('borrowers.index'));
    }

    /**
     * Remove the specified Borrower from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $borrower = $this->borrowerRepository->findWithoutFail($id);

        if (empty($borrower)) {
            Flash::error('Borrower not found');

            return redirect(route('borrowers.index'));
        }

        $this->borrowerRepository->delete($id);

        Flash::success('Borrower deleted successfully.');

        return redirect(route('borrowers.index'));
    }
}
