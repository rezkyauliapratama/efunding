<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdentityTypeRequest;
use App\Http\Requests\UpdateIdentityTypeRequest;
use App\Repositories\IdentityTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class IdentityTypeController extends AppBaseController
{
    /** @var  IdentityTypeRepository */
    private $identityTypeRepository;

    public function __construct(IdentityTypeRepository $identityTypeRepo)
    {
        $this->identityTypeRepository = $identityTypeRepo;
    }

    /**
     * Display a listing of the IdentityType.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->identityTypeRepository->pushCriteria(new RequestCriteria($request));
        $identityTypes = $this->identityTypeRepository->all();

        return view('identity_types.index')
            ->with('identityTypes', $identityTypes);
    }

    /**
     * Show the form for creating a new IdentityType.
     *
     * @return Response
     */
    public function create()
    {
        return view('identity_types.create');
    }

    /**
     * Store a newly created IdentityType in storage.
     *
     * @param CreateIdentityTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateIdentityTypeRequest $request)
    {
        $input = $request->all();

        $identityType = $this->identityTypeRepository->create($input);

        Flash::success('Identity Type saved successfully.');

        return redirect(route('identityTypes.index'));
    }

    /**
     * Display the specified IdentityType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $identityType = $this->identityTypeRepository->findWithoutFail($id);

        if (empty($identityType)) {
            Flash::error('Identity Type not found');

            return redirect(route('identityTypes.index'));
        }

        return view('identity_types.show')->with('identityType', $identityType);
    }

    /**
     * Show the form for editing the specified IdentityType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $identityType = $this->identityTypeRepository->findWithoutFail($id);

        if (empty($identityType)) {
            Flash::error('Identity Type not found');

            return redirect(route('identityTypes.index'));
        }

        return view('identity_types.edit')->with('identityType', $identityType);
    }

    /**
     * Update the specified IdentityType in storage.
     *
     * @param  int              $id
     * @param UpdateIdentityTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIdentityTypeRequest $request)
    {
        $identityType = $this->identityTypeRepository->findWithoutFail($id);

        if (empty($identityType)) {
            Flash::error('Identity Type not found');

            return redirect(route('identityTypes.index'));
        }

        $identityType = $this->identityTypeRepository->update($request->all(), $id);

        Flash::success('Identity Type updated successfully.');

        return redirect(route('identityTypes.index'));
    }

    /**
     * Remove the specified IdentityType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $identityType = $this->identityTypeRepository->findWithoutFail($id);

        if (empty($identityType)) {
            Flash::error('Identity Type not found');

            return redirect(route('identityTypes.index'));
        }

        $this->identityTypeRepository->delete($id);

        Flash::success('Identity Type deleted successfully.');

        return redirect(route('identityTypes.index'));
    }
}
