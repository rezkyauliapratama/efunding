<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLendAPIRequest;
use App\Http\Requests\API\UpdateLendAPIRequest;
use App\Models\Lend;
use App\Repositories\LendRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LendController
 * @package App\Http\Controllers\API
 */

class LendAPIController extends AppBaseController
{
    /** @var  LendRepository */
    private $lendRepository;

    public function __construct(LendRepository $lendRepo)
    {
        $this->lendRepository = $lendRepo;
    }

    /**
     * Display a listing of the Lend.
     * GET|HEAD /lends
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lendRepository->pushCriteria(new RequestCriteria($request));
        $this->lendRepository->pushCriteria(new LimitOffsetCriteria($request));
        $lends = $this->lendRepository->all();

        return $this->sendResponse($lends->toArray(), 'Lends retrieved successfully');
    }

    /**
     * Store a newly created Lend in storage.
     * POST /lends
     *
     * @param CreateLendAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLendAPIRequest $request)
    {
        $input = $request->all();

        $lends = $this->lendRepository->create($input);

        return $this->sendResponse($lends->toArray(), 'Lend saved successfully');
    }

    /**
     * Display the specified Lend.
     * GET|HEAD /lends/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Lend $lend */
        $lend = $this->lendRepository->findWithoutFail($id);

        if (empty($lend)) {
            return $this->sendError('Lend not found');
        }

        return $this->sendResponse($lend->toArray(), 'Lend retrieved successfully');
    }

    /**
     * Update the specified Lend in storage.
     * PUT/PATCH /lends/{id}
     *
     * @param  int $id
     * @param UpdateLendAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLendAPIRequest $request)
    {
        $input = $request->all();

        /** @var Lend $lend */
        $lend = $this->lendRepository->findWithoutFail($id);

        if (empty($lend)) {
            return $this->sendError('Lend not found');
        }

        $lend = $this->lendRepository->update($input, $id);

        return $this->sendResponse($lend->toArray(), 'Lend updated successfully');
    }

    /**
     * Remove the specified Lend from storage.
     * DELETE /lends/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Lend $lend */
        $lend = $this->lendRepository->findWithoutFail($id);

        if (empty($lend)) {
            return $this->sendError('Lend not found');
        }

        $lend->delete();

        return $this->sendResponse($id, 'Lend deleted successfully');
    }
}
