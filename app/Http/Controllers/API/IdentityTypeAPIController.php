<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateIdentityTypeAPIRequest;
use App\Http\Requests\API\UpdateIdentityTypeAPIRequest;
use App\Models\IdentityType;
use App\Repositories\IdentityTypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class IdentityTypeController
 * @package App\Http\Controllers\API
 */

class IdentityTypeAPIController extends AppBaseController
{
    /** @var  IdentityTypeRepository */
    private $identityTypeRepository;

    public function __construct(IdentityTypeRepository $identityTypeRepo)
    {
        $this->identityTypeRepository = $identityTypeRepo;
    }

    /**
     * Display a listing of the IdentityType.
     * GET|HEAD /identityTypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->identityTypeRepository->pushCriteria(new RequestCriteria($request));
        $this->identityTypeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $identityTypes = $this->identityTypeRepository->all();

        return $this->sendResponse($identityTypes->toArray(), 'Identity Types retrieved successfully');
    }

    /**
     * Store a newly created IdentityType in storage.
     * POST /identityTypes
     *
     * @param CreateIdentityTypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateIdentityTypeAPIRequest $request)
    {
        $input = $request->all();

        $identityTypes = $this->identityTypeRepository->create($input);

        return $this->sendResponse($identityTypes->toArray(), 'Identity Type saved successfully');
    }

    /**
     * Display the specified IdentityType.
     * GET|HEAD /identityTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var IdentityType $identityType */
        $identityType = $this->identityTypeRepository->findWithoutFail($id);

        if (empty($identityType)) {
            return $this->sendError('Identity Type not found');
        }

        return $this->sendResponse($identityType->toArray(), 'Identity Type retrieved successfully');
    }

    /**
     * Update the specified IdentityType in storage.
     * PUT/PATCH /identityTypes/{id}
     *
     * @param  int $id
     * @param UpdateIdentityTypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIdentityTypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var IdentityType $identityType */
        $identityType = $this->identityTypeRepository->findWithoutFail($id);

        if (empty($identityType)) {
            return $this->sendError('Identity Type not found');
        }

        $identityType = $this->identityTypeRepository->update($input, $id);

        return $this->sendResponse($identityType->toArray(), 'IdentityType updated successfully');
    }

    /**
     * Remove the specified IdentityType from storage.
     * DELETE /identityTypes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var IdentityType $identityType */
        $identityType = $this->identityTypeRepository->findWithoutFail($id);

        if (empty($identityType)) {
            return $this->sendError('Identity Type not found');
        }

        $identityType->delete();

        return $this->sendResponse($id, 'Identity Type deleted successfully');
    }
}
