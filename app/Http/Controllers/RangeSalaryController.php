<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRangeSalaryRequest;
use App\Http\Requests\UpdateRangeSalaryRequest;
use App\Repositories\RangeSalaryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RangeSalaryController extends AppBaseController
{
    /** @var  RangeSalaryRepository */
    private $rangeSalaryRepository;

    public function __construct(RangeSalaryRepository $rangeSalaryRepo)
    {
        $this->rangeSalaryRepository = $rangeSalaryRepo;
    }

    /**
     * Display a listing of the RangeSalary.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rangeSalaryRepository->pushCriteria(new RequestCriteria($request));
        $rangeSalaries = $this->rangeSalaryRepository->all();

        return view('range_salaries.index')
            ->with('rangeSalaries', $rangeSalaries);
    }

    /**
     * Show the form for creating a new RangeSalary.
     *
     * @return Response
     */
    public function create()
    {
        return view('range_salaries.create');
    }

    /**
     * Store a newly created RangeSalary in storage.
     *
     * @param CreateRangeSalaryRequest $request
     *
     * @return Response
     */
    public function store(CreateRangeSalaryRequest $request)
    {
        $input = $request->all();

        $rangeSalary = $this->rangeSalaryRepository->create($input);

        Flash::success('Range Salary saved successfully.');

        return redirect(route('rangeSalaries.index'));
    }

    /**
     * Display the specified RangeSalary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rangeSalary = $this->rangeSalaryRepository->findWithoutFail($id);

        if (empty($rangeSalary)) {
            Flash::error('Range Salary not found');

            return redirect(route('rangeSalaries.index'));
        }

        return view('range_salaries.show')->with('rangeSalary', $rangeSalary);
    }

    /**
     * Show the form for editing the specified RangeSalary.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rangeSalary = $this->rangeSalaryRepository->findWithoutFail($id);

        if (empty($rangeSalary)) {
            Flash::error('Range Salary not found');

            return redirect(route('rangeSalaries.index'));
        }

        return view('range_salaries.edit')->with('rangeSalary', $rangeSalary);
    }

    /**
     * Update the specified RangeSalary in storage.
     *
     * @param  int              $id
     * @param UpdateRangeSalaryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRangeSalaryRequest $request)
    {
        $rangeSalary = $this->rangeSalaryRepository->findWithoutFail($id);

        if (empty($rangeSalary)) {
            Flash::error('Range Salary not found');

            return redirect(route('rangeSalaries.index'));
        }

        $rangeSalary = $this->rangeSalaryRepository->update($request->all(), $id);

        Flash::success('Range Salary updated successfully.');

        return redirect(route('rangeSalaries.index'));
    }

    /**
     * Remove the specified RangeSalary from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rangeSalary = $this->rangeSalaryRepository->findWithoutFail($id);

        if (empty($rangeSalary)) {
            Flash::error('Range Salary not found');

            return redirect(route('rangeSalaries.index'));
        }

        $this->rangeSalaryRepository->delete($id);

        Flash::success('Range Salary deleted successfully.');

        return redirect(route('rangeSalaries.index'));
    }
}
