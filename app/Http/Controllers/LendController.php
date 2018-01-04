<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLendRequest;
use App\Http\Requests\UpdateLendRequest;
use App\Repositories\LendRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LendController extends AppBaseController
{
    /** @var  LendRepository */
    private $lendRepository;

    public function __construct(LendRepository $lendRepo)
    {
        $this->lendRepository = $lendRepo;
    }

    /**
     * Display a listing of the Lend.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->lendRepository->pushCriteria(new RequestCriteria($request));
        $lends = $this->lendRepository->all();

        return view('lends.index')
            ->with('lends', $lends);
    }

    /**
     * Show the form for creating a new Lend.
     *
     * @return Response
     */
    public function create()
    {
        return view('lends.create');
    }

    /**
     * Store a newly created Lend in storage.
     *
     * @param CreateLendRequest $request
     *
     * @return Response
     */
    public function store(CreateLendRequest $request)
    {
        $input = $request->all();

        $lend = $this->lendRepository->create($input);

        Flash::success('Lend saved successfully.');

        return redirect(route('lends.index'));
    }

    /**
     * Display the specified Lend.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lend = $this->lendRepository->findWithoutFail($id);

        if (empty($lend)) {
            Flash::error('Lend not found');

            return redirect(route('lends.index'));
        }

        return view('lends.show')->with('lend', $lend);
    }

    /**
     * Show the form for editing the specified Lend.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lend = $this->lendRepository->findWithoutFail($id);

        if (empty($lend)) {
            Flash::error('Lend not found');

            return redirect(route('lends.index'));
        }

        return view('lends.edit')->with('lend', $lend);
    }

    /**
     * Update the specified Lend in storage.
     *
     * @param  int              $id
     * @param UpdateLendRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLendRequest $request)
    {
        $lend = $this->lendRepository->findWithoutFail($id);

        if (empty($lend)) {
            Flash::error('Lend not found');

            return redirect(route('lends.index'));
        }

        $lend = $this->lendRepository->update($request->all(), $id);

        Flash::success('Lend updated successfully.');

        return redirect(route('lends.index'));
    }

    /**
     * Remove the specified Lend from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lend = $this->lendRepository->findWithoutFail($id);

        if (empty($lend)) {
            Flash::error('Lend not found');

            return redirect(route('lends.index'));
        }

        $this->lendRepository->delete($id);

        Flash::success('Lend deleted successfully.');

        return redirect(route('lends.index'));
    }
}
