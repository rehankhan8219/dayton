<?php

namespace App\Http\Controllers\Backend;

use App\Models\Bill;
use App\Services\BillService;
use App\Services\PermissionService;
use App\Http\Requests\Bill\EditBillRequest;
use App\Http\Requests\Bill\StoreBillRequest;
use App\Http\Requests\Bill\DeleteBillRequest;
use App\Http\Requests\Bill\UpdateBillRequest;
use App\Models\User;
use App\Services\UserService;

/**
 * Class BillController.
 */
class BillController
{
    /**
     * @var BillService
     */
    protected $billService;
    
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * BillController constructor.
     *
     * @param  BillService  $billService
     * @param  UserService $userService
     */
    public function __construct(BillService $billService, UserService $userService)
    {
        $this->billService = $billService;
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.bill.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.bill.create')
            ->withUsers($this->userService->getByType(User::TYPE_USER));
    }

    /**
     * @param  StoreBillRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreBillRequest $request)
    {
        $this->billService->store($request->validated());

        return redirect()->route('admin.bill.index')->withFlashSuccess(__('The bill was successfully created.'));
    }

    /**
     * @param  EditBillRequest  $request
     * @param  Bill  $bill
     * @return mixed
     */
    public function edit(EditBillRequest $request, Bill $bill)
    {
        return view('backend.bill.edit')
            ->withUsers($this->userService->getByType(User::TYPE_USER))
            ->withBill($bill);
    }

    /**
     * @param  UpdateBillRequest  $request
     * @param  Bill  $bill
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        $this->billService->update($bill, $request->validated());

        return redirect()->route('admin.bill.index')->withFlashSuccess(__('The bill was successfully updated.'));
    }

    /**
     * @param  DeleteBillRequest  $request
     * @param  Bill  $bill
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(DeleteBillRequest $request, Bill $bill)
    {
        $this->billService->destroy($bill);

        return redirect()->route('admin.bill.index')->withFlashSuccess(__('The bill was successfully deleted.'));
    }
}
