<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInvestmentRequest;
use App\Http\Requests\UpdateInvestmentRequest;
use App\Repositories\InvestmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class InvestmentController extends AppBaseController
{
    /** @var  InvestmentRepository */
    private $investmentRepository;

    public function __construct(InvestmentRepository $investmentRepo)
    {
        $this->investmentRepository = $investmentRepo;
    }

    /**
     * Display a listing of the Investment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->investmentRepository->pushCriteria(new RequestCriteria($request));
        $investments = $this->investmentRepository->all();

        return view('investments.index')
            ->with('investments', $investments);
    }

    /**
     * Show the form for creating a new Investment.
     *
     * @return Response
     */
    public function create()
    {
        return view('investments.create');
    }

    /**
     * Store a newly created Investment in storage.
     *
     * @param CreateInvestmentRequest $request
     *
     * @return Response
     */
    public function store(CreateInvestmentRequest $request)
    {
        $input = $request->all();

        $investment = $this->investmentRepository->create($input);

        Flash::success('Investment saved successfully.');

        return redirect(route('investments.index'));
    }

    /**
     * Display the specified Investment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $investment = $this->investmentRepository->findWithoutFail($id);

        if (empty($investment)) {
            Flash::error('Investment not found');

            return redirect(route('investments.index'));
        }

        return view('investments.show')->with('investment', $investment);
    }

    /**
     * Show the form for editing the specified Investment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $investment = $this->investmentRepository->findWithoutFail($id);

        if (empty($investment)) {
            Flash::error('Investment not found');

            return redirect(route('investments.index'));
        }

        return view('investments.edit')->with('investment', $investment);
    }

    /**
     * Update the specified Investment in storage.
     *
     * @param  int              $id
     * @param UpdateInvestmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvestmentRequest $request)
    {
        $investment = $this->investmentRepository->findWithoutFail($id);

        if (empty($investment)) {
            Flash::error('Investment not found');

            return redirect(route('investments.index'));
        }

        $investment = $this->investmentRepository->update($request->all(), $id);

        Flash::success('Investment updated successfully.');

        return redirect(route('investments.index'));
    }

    /**
     * Remove the specified Investment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $investment = $this->investmentRepository->findWithoutFail($id);

        if (empty($investment)) {
            Flash::error('Investment not found');

            return redirect(route('investments.index'));
        }

        $this->investmentRepository->delete($id);

        Flash::success('Investment deleted successfully.');

        return redirect(route('investments.index'));
    }
}
