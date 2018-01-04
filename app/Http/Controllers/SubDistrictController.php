<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubDistrictRequest;
use App\Http\Requests\UpdateSubDistrictRequest;
use App\Repositories\SubDistrictRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SubDistrictController extends AppBaseController
{
    /** @var  SubDistrictRepository */
    private $subDistrictRepository;

    public function __construct(SubDistrictRepository $subDistrictRepo)
    {
        $this->subDistrictRepository = $subDistrictRepo;
    }

    /**
     * Display a listing of the SubDistrict.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->subDistrictRepository->pushCriteria(new RequestCriteria($request));
        $subDistricts = $this->subDistrictRepository->all();

        return view('sub_districts.index')
            ->with('subDistricts', $subDistricts);
    }

    /**
     * Show the form for creating a new SubDistrict.
     *
     * @return Response
     */
    public function create()
    {
        return view('sub_districts.create');
    }

    /**
     * Store a newly created SubDistrict in storage.
     *
     * @param CreateSubDistrictRequest $request
     *
     * @return Response
     */
    public function store(CreateSubDistrictRequest $request)
    {
        $input = $request->all();

        $subDistrict = $this->subDistrictRepository->create($input);

        Flash::success('Sub District saved successfully.');

        return redirect(route('subDistricts.index'));
    }

    /**
     * Display the specified SubDistrict.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $subDistrict = $this->subDistrictRepository->findWithoutFail($id);

        if (empty($subDistrict)) {
            Flash::error('Sub District not found');

            return redirect(route('subDistricts.index'));
        }

        return view('sub_districts.show')->with('subDistrict', $subDistrict);
    }

    /**
     * Show the form for editing the specified SubDistrict.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $subDistrict = $this->subDistrictRepository->findWithoutFail($id);

        if (empty($subDistrict)) {
            Flash::error('Sub District not found');

            return redirect(route('subDistricts.index'));
        }

        return view('sub_districts.edit')->with('subDistrict', $subDistrict);
    }

    /**
     * Update the specified SubDistrict in storage.
     *
     * @param  int              $id
     * @param UpdateSubDistrictRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubDistrictRequest $request)
    {
        $subDistrict = $this->subDistrictRepository->findWithoutFail($id);

        if (empty($subDistrict)) {
            Flash::error('Sub District not found');

            return redirect(route('subDistricts.index'));
        }

        $subDistrict = $this->subDistrictRepository->update($request->all(), $id);

        Flash::success('Sub District updated successfully.');

        return redirect(route('subDistricts.index'));
    }

    /**
     * Remove the specified SubDistrict from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $subDistrict = $this->subDistrictRepository->findWithoutFail($id);

        if (empty($subDistrict)) {
            Flash::error('Sub District not found');

            return redirect(route('subDistricts.index'));
        }

        $this->subDistrictRepository->delete($id);

        Flash::success('Sub District deleted successfully.');

        return redirect(route('subDistricts.index'));
    }
}
