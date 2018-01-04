<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAkadAPIRequest;
use App\Http\Requests\API\UpdateAkadAPIRequest;
use App\Models\Akad;
use App\Repositories\AkadRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AkadController
 * @package App\Http\Controllers\API
 */

class AkadAPIController extends AppBaseController
{
    /** @var  AkadRepository */
    private $akadRepository;

    public function __construct(AkadRepository $akadRepo)
    {
        $this->akadRepository = $akadRepo;
    }

    /**
     * Display a listing of the Akad.
     * GET|HEAD /akads
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->akadRepository->pushCriteria(new RequestCriteria($request));
        $this->akadRepository->pushCriteria(new LimitOffsetCriteria($request));
        $akads = $this->akadRepository->all();

        return $this->sendResponse($akads->toArray(), 'Akads retrieved successfully');
    }

    /**
     * Store a newly created Akad in storage.
     * POST /akads
     *
     * @param CreateAkadAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAkadAPIRequest $request)
    {
        $input = $request->all();

        $akads = $this->akadRepository->create($input);

        return $this->sendResponse($akads->toArray(), 'Akad saved successfully');
    }

    /**
     * Display the specified Akad.
     * GET|HEAD /akads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Akad $akad */
        $akad = $this->akadRepository->findWithoutFail($id);

        if (empty($akad)) {
            return $this->sendError('Akad not found');
        }

        return $this->sendResponse($akad->toArray(), 'Akad retrieved successfully');
    }

    /**
     * Update the specified Akad in storage.
     * PUT/PATCH /akads/{id}
     *
     * @param  int $id
     * @param UpdateAkadAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAkadAPIRequest $request)
    {
        $input = $request->all();

        /** @var Akad $akad */
        $akad = $this->akadRepository->findWithoutFail($id);

        if (empty($akad)) {
            return $this->sendError('Akad not found');
        }

        $akad = $this->akadRepository->update($input, $id);

        return $this->sendResponse($akad->toArray(), 'Akad updated successfully');
    }

    /**
     * Remove the specified Akad from storage.
     * DELETE /akads/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Akad $akad */
        $akad = $this->akadRepository->findWithoutFail($id);

        if (empty($akad)) {
            return $this->sendError('Akad not found');
        }

        $akad->delete();

        return $this->sendResponse($id, 'Akad deleted successfully');
    }
}
