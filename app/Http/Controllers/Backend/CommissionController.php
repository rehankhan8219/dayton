<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\Commission;
use App\Services\UserService;
use App\Services\CommissionService;
use App\Http\Requests\Commission\EditCommissionRequest;
use App\Http\Requests\Commission\StoreCommissionRequest;
use App\Http\Requests\Commission\DeleteCommissionRequest;
use App\Http\Requests\Commission\UpdateCommissionRequest;

/**
 * Class CommissionController.
 */
class CommissionController
{
    /**
     * @var CommissionService
     */
    protected $commissionService;
    
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * CommissionController constructor.
     *
     * @param  CommissionService  $commissionService
     * @param  UserService $userService
     */
    public function __construct(CommissionService $commissionService, UserService $userService)
    {
        $this->commissionService = $commissionService;
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.commission.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.commission.create')
            ->withUsers($this->userService->getByType(User::TYPE_USER));
    }

    /**
     * @param  StoreCommissionRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreCommissionRequest $request)
    {
        $this->commissionService->store($request->validated());

        return redirect()->route('admin.commission.index')->withFlashSuccess(__('The commission was successfully created.'));
    }

    /**
     * @param  EditCommissionRequest  $request
     * @param  Commission  $commission
     * @return mixed
     */
    public function edit(EditCommissionRequest $request, Commission $commission)
    {
        return view('backend.commission.edit')
            ->withUsers($this->userService->getByType(User::TYPE_USER))
            ->withCommission($commission);
    }

    /**
     * @param  UpdateCommissionRequest  $request
     * @param  Commission  $commission
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateCommissionRequest $request, Commission $commission)
    {
        $this->commissionService->update($commission, $request->validated());

        return redirect()->route('admin.commission.index')->withFlashSuccess(__('The commission was successfully updated.'));
    }

    /**
     * @param  DeleteCommissionRequest  $request
     * @param  Commission  $commission
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(DeleteCommissionRequest $request, Commission $commission)
    {
        $this->commissionService->destroy($commission);

        return redirect()->route('admin.commission.index')->withFlashSuccess(__('The commission was successfully deleted.'));
    }
}
