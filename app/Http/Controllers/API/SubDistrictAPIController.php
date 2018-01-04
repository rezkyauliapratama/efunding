<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubDistrictAPIRequest;
use App\Http\Requests\API\UpdateSubDistrictAPIRequest;
use App\Models\SubDistrict;
use App\Repositories\SubDistrictRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SubDistrictController
 * @package App\Http\Controllers\API
 */

class SubDistrictAPIController extends AppBaseController
{
    /** @var  SubDistrictRepository */
    private $subDistrictRepository;

    public function __construct(SubDistrictRepository $subDistrictRepo)
    {
        $this->subDistrictRepository = $subDistrictRepo;
    }

    /**
     * Display a listing of the SubDistrict.
     * GET|HEAD /subDistricts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subDistrictRepository->pushCriteria(new RequestCriteria($request));
        $this->subDistrictRepository->pushCriteria(new LimitOffsetCriteria($request));
        $subDistricts = $this->subDistrictRepository->all();

        return $this->sendResponse($subDistricts->toArray(), 'Sub Districts retrieved successfully');
    }

    /**
     * Store a newly created SubDistrict in storage.
     * POST /subDistricts
     *
     * @param CreateSubDistrictAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubDistrictAPIRequest $request)
    {
        $input = $request->all();

        $subDistricts = $this->subDistrictRepository->create($input);

        return $this->sendResponse($subDistricts->toArray(), 'Sub District saved successfully');
    }

    /**
     * Display the specified SubDistrict.
     * GET|HEAD /subDistricts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubDistrict $subDistrict */
        $subDistrict = $this->subDistrictRepository->findWithoutFail($id);

        if (empty($subDistrict)) {
            return $this->sendError('Sub District not found');
        }

        return $this->sendResponse($subDistrict->toArray(), 'Sub District retrieved successfully');
    }

    /**
     * Update the specified SubDistrict in storage.
     * PUT/PATCH /subDistricts/{id}
     *
     * @param  int $id
     * @param UpdateSubDistrictAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubDistrictAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubDistrict $subDistrict */
        $subDistrict = $this->subDistrictRepository->findWithoutFail($id);

        if (empty($subDistrict)) {
            return $this->sendError('Sub District not found');
        }

        $subDistrict = $this->subDistrictRepository->update($input, $id);

        return $this->sendResponse($subDistrict->toArray(), 'SubDistrict updated successfully');
    }

    /**
     * Remove the specified SubDistrict from storage.
     * DELETE /subDistricts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubDistrict $subDistrict */
        $subDistrict = $this->subDistrictRepository->findWithoutFail($id);

        if (empty($subDistrict)) {
            return $this->sendError('Sub District not found');
        }

        $subDistrict->delete();

        return $this->sendResponse($id, 'Sub District deleted successfully');
    }
}
