<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUrbanVillageAPIRequest;
use App\Http\Requests\API\UpdateUrbanVillageAPIRequest;
use App\Models\UrbanVillage;
use App\Repositories\UrbanVillageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UrbanVillageController
 * @package App\Http\Controllers\API
 */

class UrbanVillageAPIController extends AppBaseController
{
    /** @var  UrbanVillageRepository */
    private $urbanVillageRepository;

    public function __construct(UrbanVillageRepository $urbanVillageRepo)
    {
        $this->urbanVillageRepository = $urbanVillageRepo;
    }

    /**
     * Display a listing of the UrbanVillage.
     * GET|HEAD /urbanVillages
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->urbanVillageRepository->pushCriteria(new RequestCriteria($request));
        $this->urbanVillageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $urbanVillages = $this->urbanVillageRepository->all();

        return $this->sendResponse($urbanVillages->toArray(), 'Urban Villages retrieved successfully');
    }

    /**
     * Store a newly created UrbanVillage in storage.
     * POST /urbanVillages
     *
     * @param CreateUrbanVillageAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUrbanVillageAPIRequest $request)
    {
        $input = $request->all();

        $urbanVillages = $this->urbanVillageRepository->create($input);

        return $this->sendResponse($urbanVillages->toArray(), 'Urban Village saved successfully');
    }

    /**
     * Display the specified UrbanVillage.
     * GET|HEAD /urbanVillages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UrbanVillage $urbanVillage */
        $urbanVillage = $this->urbanVillageRepository->findWithoutFail($id);

        if (empty($urbanVillage)) {
            return $this->sendError('Urban Village not found');
        }

        return $this->sendResponse($urbanVillage->toArray(), 'Urban Village retrieved successfully');
    }

    /**
     * Update the specified UrbanVillage in storage.
     * PUT/PATCH /urbanVillages/{id}
     *
     * @param  int $id
     * @param UpdateUrbanVillageAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUrbanVillageAPIRequest $request)
    {
        $input = $request->all();

        /** @var UrbanVillage $urbanVillage */
        $urbanVillage = $this->urbanVillageRepository->findWithoutFail($id);

        if (empty($urbanVillage)) {
            return $this->sendError('Urban Village not found');
        }

        $urbanVillage = $this->urbanVillageRepository->update($input, $id);

        return $this->sendResponse($urbanVillage->toArray(), 'UrbanVillage updated successfully');
    }

    /**
     * Remove the specified UrbanVillage from storage.
     * DELETE /urbanVillages/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UrbanVillage $urbanVillage */
        $urbanVillage = $this->urbanVillageRepository->findWithoutFail($id);

        if (empty($urbanVillage)) {
            return $this->sendError('Urban Village not found');
        }

        $urbanVillage->delete();

        return $this->sendResponse($id, 'Urban Village deleted successfully');
    }
}
