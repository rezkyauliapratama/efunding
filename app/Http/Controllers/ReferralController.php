<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReferralRequest;
use App\Http\Requests\UpdateReferralRequest;
use App\Repositories\ReferralRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ReferralController extends AppBaseController
{
    /** @var  ReferralRepository */
    private $referralRepository;

    public function __construct(ReferralRepository $referralRepo)
    {
        $this->referralRepository = $referralRepo;
    }

    /**
     * Display a listing of the Referral.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->referralRepository->pushCriteria(new RequestCriteria($request));
        $referrals = $this->referralRepository->all();

        return view('referrals.index')
            ->with('referrals', $referrals);
    }

    /**
     * Show the form for creating a new Referral.
     *
     * @return Response
     */
    public function create()
    {
        return view('referrals.create');
    }

    /**
     * Store a newly created Referral in storage.
     *
     * @param CreateReferralRequest $request
     *
     * @return Response
     */
    public function store(CreateReferralRequest $request)
    {
        $input = $request->all();

        $referral = $this->referralRepository->create($input);

        Flash::success('Referral saved successfully.');

        return redirect(route('referrals.index'));
    }

    /**
     * Display the specified Referral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $referral = $this->referralRepository->findWithoutFail($id);

        if (empty($referral)) {
            Flash::error('Referral not found');

            return redirect(route('referrals.index'));
        }

        return view('referrals.show')->with('referral', $referral);
    }

    /**
     * Show the form for editing the specified Referral.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $referral = $this->referralRepository->findWithoutFail($id);

        if (empty($referral)) {
            Flash::error('Referral not found');

            return redirect(route('referrals.index'));
        }

        return view('referrals.edit')->with('referral', $referral);
    }

    /**
     * Update the specified Referral in storage.
     *
     * @param  int              $id
     * @param UpdateReferralRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReferralRequest $request)
    {
        $referral = $this->referralRepository->findWithoutFail($id);

        if (empty($referral)) {
            Flash::error('Referral not found');

            return redirect(route('referrals.index'));
        }

        $referral = $this->referralRepository->update($request->all(), $id);

        Flash::success('Referral updated successfully.');

        return redirect(route('referrals.index'));
    }

    /**
     * Remove the specified Referral from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $referral = $this->referralRepository->findWithoutFail($id);

        if (empty($referral)) {
            Flash::error('Referral not found');

            return redirect(route('referrals.index'));
        }

        $this->referralRepository->delete($id);

        Flash::success('Referral deleted successfully.');

        return redirect(route('referrals.index'));
    }
}
