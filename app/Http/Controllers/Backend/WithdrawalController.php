<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Withdrawal\UpdateWithdrawalStatusRequest;
use App\Models\Withdrawal;
use App\Services\WithdrawalService;

/**
 * Class WithdrawalController.
 */
class WithdrawalController
{
    /**
     * @var WithdrawalService
     */
    protected $withdrawalService;
    
    /**
     * WithdrawalController constructor.
     *
     * @param  WithdrawalService  $withdrawalService
     */
    public function __construct(WithdrawalService $withdrawalService)
    {
        $this->withdrawalService = $withdrawalService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.withdrawal.index');
    }

    /**
     * @param  UpdateWithdrawalStatusRequest  $request
     * @param  Withdrawal  $withdrawal
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function updateStatus(UpdateWithdrawalStatusRequest $request, Withdrawal $withdrawal, $status)
    {
        $this->withdrawalService->mark($withdrawal, $status);

        return redirect()->route('admin.withdrawal.index')->withFlashSuccess(__('The withdrawal was successfully updated.'));
    }
}
