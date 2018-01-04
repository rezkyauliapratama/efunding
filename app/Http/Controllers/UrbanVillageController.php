<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUrbanVillageRequest;
use App\Http\Requests\UpdateUrbanVillageRequest;
use App\Repositories\UrbanVillageRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UrbanVillageController extends AppBaseController
{
    /** @var  UrbanVillageRepository */
    private $urbanVillageRepository;

    public function __construct(UrbanVillageRepository $urbanVillageRepo)
    {
        $this->urbanVillageRepository = $urbanVillageRepo;
    }

    /**
     * Display a listing of the UrbanVillage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->urbanVillageRepository->pushCriteria(new RequestCriteria($request));
        $urbanVillages = $this->urbanVillageRepository->all();

        return view('urban_villages.index')
            ->with('urbanVillages', $urbanVillages);
    }

    /**
     * Show the form for creating a new UrbanVillage.
     *
     * @return Response
     */
    public function create()
    {
        return view('urban_villages.create');
    }

    /**
     * Store a newly created UrbanVillage in storage.
     *
     * @param CreateUrbanVillageRequest $request
     *
     * @return Response
     */
    public function store(CreateUrbanVillageRequest $request)
    {
        $input = $request->all();

        $urbanVillage = $this->urbanVillageRepository->create($input);

        Flash::success('Urban Village saved successfully.');

        return redirect(route('urbanVillages.index'));
    }

    /**
     * Display the specified UrbanVillage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $urbanVillage = $this->urbanVillageRepository->findWithoutFail($id);

        if (empty($urbanVillage)) {
            Flash::error('Urban Village not found');

            return redirect(route('urbanVillages.index'));
        }

        return view('urban_villages.show')->with('urbanVillage', $urbanVillage);
    }

    /**
     * Show the form for editing the specified UrbanVillage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $urbanVillage = $this->urbanVillageRepository->findWithoutFail($id);

        if (empty($urbanVillage)) {
            Flash::error('Urban Village not found');

            return redirect(route('urbanVillages.index'));
        }

        return view('urban_villages.edit')->with('urbanVillage', $urbanVillage);
    }

    /**
     * Update the specified UrbanVillage in storage.
     *
     * @param  int              $id
     * @param UpdateUrbanVillageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUrbanVillageRequest $request)
    {
        $urbanVillage = $this->urbanVillageRepository->findWithoutFail($id);

        if (empty($urbanVillage)) {
            Flash::error('Urban Village not found');

            return redirect(route('urbanVillages.index'));
        }

        $urbanVillage = $this->urbanVillageRepository->update($request->all(), $id);

        Flash::success('Urban Village updated successfully.');

        return redirect(route('urbanVillages.index'));
    }

    /**
     * Remove the specified UrbanVillage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $urbanVillage = $this->urbanVillageRepository->findWithoutFail($id);

        if (empty($urbanVillage)) {
            Flash::error('Urban Village not found');

            return redirect(route('urbanVillages.index'));
        }

        $this->urbanVillageRepository->delete($id);

        Flash::success('Urban Village deleted successfully.');

        return redirect(route('urbanVillages.index'));
    }
}
