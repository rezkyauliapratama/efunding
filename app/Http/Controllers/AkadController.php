<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAkadRequest;
use App\Http\Requests\UpdateAkadRequest;
use App\Repositories\AkadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AkadController extends AppBaseController
{
    /** @var  AkadRepository */
    private $akadRepository;

    public function __construct(AkadRepository $akadRepo)
    {
        $this->akadRepository = $akadRepo;
    }

    /**
     * Display a listing of the Akad.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->akadRepository->pushCriteria(new RequestCriteria($request));
        $akads = $this->akadRepository->all();

        return view('akads.index')
            ->with('akads', $akads);
    }

    /**
     * Show the form for creating a new Akad.
     *
     * @return Response
     */
    public function create()
    {
        return view('akads.create');
    }

    /**
     * Store a newly created Akad in storage.
     *
     * @param CreateAkadRequest $request
     *
     * @return Response
     */
    public function store(CreateAkadRequest $request)
    {
        $input = $request->all();

        $akad = $this->akadRepository->create($input);

        Flash::success('Akad saved successfully.');

        return redirect(route('akads.index'));
    }

    /**
     * Display the specified Akad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $akad = $this->akadRepository->findWithoutFail($id);

        if (empty($akad)) {
            Flash::error('Akad not found');

            return redirect(route('akads.index'));
        }

        return view('akads.show')->with('akad', $akad);
    }

    /**
     * Show the form for editing the specified Akad.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $akad = $this->akadRepository->findWithoutFail($id);

        if (empty($akad)) {
            Flash::error('Akad not found');

            return redirect(route('akads.index'));
        }

        return view('akads.edit')->with('akad', $akad);
    }

    /**
     * Update the specified Akad in storage.
     *
     * @param  int              $id
     * @param UpdateAkadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAkadRequest $request)
    {
        $akad = $this->akadRepository->findWithoutFail($id);

        if (empty($akad)) {
            Flash::error('Akad not found');

            return redirect(route('akads.index'));
        }

        $akad = $this->akadRepository->update($request->all(), $id);

        Flash::success('Akad updated successfully.');

        return redirect(route('akads.index'));
    }

    /**
     * Remove the specified Akad from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $akad = $this->akadRepository->findWithoutFail($id);

        if (empty($akad)) {
            Flash::error('Akad not found');

            return redirect(route('akads.index'));
        }

        $this->akadRepository->delete($id);

        Flash::success('Akad deleted successfully.');

        return redirect(route('akads.index'));
    }
}
