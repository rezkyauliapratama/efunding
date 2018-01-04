<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReferralAPIRequest;
use App\Http\Requests\API\UpdateReferralAPIRequest;
use App\Models\Referral;
use App\Repositories\ReferralRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ReferralController
 * @package App\Http\Controllers\API
 */

class ReferralAPIController extends AppBaseController
{
    /** @var  ReferralRepository */
    private $referralRepository;

    public function __construct(ReferralRepository $referralRepo)
    {
        $this->referralRepository = $referralRepo;
    }

    /**
     * Display a listing of the Referral.
     * GET|HEAD /referrals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->referralRepository->pushCriteria(new RequestCriteria($request));
        $this->referralRepository->pushCriteria(new LimitOffsetCriteria($request));
        $referrals = $this->referralRepository->all();

        return $this->sendResponse($referrals->toArray(), 'Referrals retrieved successfully');
    }

    /**
     * Store a newly created Referral in storage.
     * POST /referrals
     *
     * @param CreateReferralAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReferralAPIRequest $request)
    {
        $input = $request->all();

        $referrals = $this->referralRepository->create($input);

        return $this->sendResponse($referrals->toArray(), 'Referral saved successfully');
    }

    /**
     * Display the specified Referral.
     * GET|HEAD /referrals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Referral $referral */
        $referral = $this->referralRepository->findWithoutFail($id);

        if (empty($referral)) {
            return $this->sendError('Referral not found');
        }

        return $this->sendResponse($referral->toArray(), 'Referral retrieved successfully');
    }

    /**
     * Update the specified Referral in storage.
     * PUT/PATCH /referrals/{id}
     *
     * @param  int $id
     * @param UpdateReferralAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReferralAPIRequest $request)
    {
        $input = $request->all();

        /** @var Referral $referral */
        $referral = $this->referralRepository->findWithoutFail($id);

        if (empty($referral)) {
            return $this->sendError('Referral not found');
        }

        $referral = $this->referralRepository->update($input, $id);

        return $this->sendResponse($referral->toArray(), 'Referral updated successfully');
    }

    /**
     * Remove the specified Referral from storage.
     * DELETE /referrals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Referral $referral */
        $referral = $this->referralRepository->findWithoutFail($id);

        if (empty($referral)) {
            return $this->sendError('Referral not found');
        }

        $referral->delete();

        return $this->sendResponse($id, 'Referral deleted successfully');
    }
}
