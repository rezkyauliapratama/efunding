<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateBorrowerAPIRequest;
use App\Http\Requests\API\UpdateBorrowerAPIRequest;
use App\Models\Borrower;
use App\Repositories\BorrowerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BorrowerController
 * @package App\Http\Controllers\API
 */

class BorrowerAPIController extends AppBaseController
{
    /** @var  BorrowerRepository */
    private $borrowerRepository;

    public function __construct(BorrowerRepository $borrowerRepo)
    {
        $this->borrowerRepository = $borrowerRepo;
    }

    /**
     * Display a listing of the Borrower.
     * GET|HEAD /borrowers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->borrowerRepository->pushCriteria(new RequestCriteria($request));
        $this->borrowerRepository->pushCriteria(new LimitOffsetCriteria($request));
        $borrowers = $this->borrowerRepository->all();

        return $this->sendResponse($borrowers->toArray(), 'Borrowers retrieved successfully');
    }

    /**
     * Store a newly created Borrower in storage.
     * POST /borrowers
     *
     * @param CreateBorrowerAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBorrowerAPIRequest $request)
    {
        $input = $request->all();

        $borrowers = $this->borrowerRepository->create($input);

        return $this->sendResponse($borrowers->toArray(), 'Borrower saved successfully');
    }

    /**
     * Display the specified Borrower.
     * GET|HEAD /borrowers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Borrower $borrower */
        $borrower = $this->borrowerRepository->findWithoutFail($id);

        if (empty($borrower)) {
            return $this->sendError('Borrower not found');
        }

        return $this->sendResponse($borrower->toArray(), 'Borrower retrieved successfully');
    }

    /**
     * Update the specified Borrower in storage.
     * PUT/PATCH /borrowers/{id}
     *
     * @param  int $id
     * @param UpdateBorrowerAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBorrowerAPIRequest $request)
    {
        $input = $request->all();

        /** @var Borrower $borrower */
        $borrower = $this->borrowerRepository->findWithoutFail($id);

        if (empty($borrower)) {
            return $this->sendError('Borrower not found');
        }

        $borrower = $this->borrowerRepository->update($input, $id);

        return $this->sendResponse($borrower->toArray(), 'Borrower updated successfully');
    }

    /**
     * Remove the specified Borrower from storage.
     * DELETE /borrowers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Borrower $borrower */
        $borrower = $this->borrowerRepository->findWithoutFail($id);

        if (empty($borrower)) {
            return $this->sendError('Borrower not found');
        }

        $borrower->delete();

        return $this->sendResponse($id, 'Borrower deleted successfully');
    }
}
