<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCampaignAPIRequest;
use App\Http\Requests\API\UpdateCampaignAPIRequest;
use App\Models\Campaign;
use App\Repositories\CampaignRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CampaignController
 * @package App\Http\Controllers\API
 */

class CampaignAPIController extends AppBaseController
{
    /** @var  CampaignRepository */
    private $campaignRepository;

    public function __construct(CampaignRepository $campaignRepo)
    {
        $this->campaignRepository = $campaignRepo;
    }

    /**
     * Display a listing of the Campaign.
     * GET|HEAD /campaigns
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->campaignRepository->pushCriteria(new RequestCriteria($request));
        $this->campaignRepository->pushCriteria(new LimitOffsetCriteria($request));
        $campaigns = $this->campaignRepository->all();

        return $this->sendResponse($campaigns->toArray(), 'Campaigns retrieved successfully');
    }

    /**
     * Store a newly created Campaign in storage.
     * POST /campaigns
     *
     * @param CreateCampaignAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCampaignAPIRequest $request)
    {
        $input = $request->all();

        $campaigns = $this->campaignRepository->create($input);

        return $this->sendResponse($campaigns->toArray(), 'Campaign saved successfully');
    }

    /**
     * Display the specified Campaign.
     * GET|HEAD /campaigns/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Campaign $campaign */
        $campaign = $this->campaignRepository->findWithoutFail($id);

        if (empty($campaign)) {
            return $this->sendError('Campaign not found');
        }

        return $this->sendResponse($campaign->toArray(), 'Campaign retrieved successfully');
    }

    /**
     * Update the specified Campaign in storage.
     * PUT/PATCH /campaigns/{id}
     *
     * @param  int $id
     * @param UpdateCampaignAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCampaignAPIRequest $request)
    {
        $input = $request->all();

        /** @var Campaign $campaign */
        $campaign = $this->campaignRepository->findWithoutFail($id);

        if (empty($campaign)) {
            return $this->sendError('Campaign not found');
        }

        $campaign = $this->campaignRepository->update($input, $id);

        return $this->sendResponse($campaign->toArray(), 'Campaign updated successfully');
    }

    /**
     * Remove the specified Campaign from storage.
     * DELETE /campaigns/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Campaign $campaign */
        $campaign = $this->campaignRepository->findWithoutFail($id);

        if (empty($campaign)) {
            return $this->sendError('Campaign not found');
        }

        $campaign->delete();

        return $this->sendResponse($id, 'Campaign deleted successfully');
    }
}
