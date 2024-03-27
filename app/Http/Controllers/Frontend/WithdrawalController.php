<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
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
        $withdrawals = auth()->user()->withdrawals()->latest()->get();
        return view('frontend.withdrawal.index')
            ->withWithdrawals($withdrawals);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('frontend.withdrawal.create');
    }

    /**
     * @param  Request  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'bank_name' => 'required|string|max:191',
            'bank_account_name' => 'required|string|max:191',
            'bank_account_number' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['status'] = 'processing';

        $this->withdrawalService->store($data);

        return redirect()->route('frontend.withdrawal.submitted')->withFlashSuccess(__('The withdrawal was successfully created.'));
    }

    /**
     * @return mixed
     */
    public function showRequestSubmittedPage()
    {
        return view('frontend.withdrawal.submitted');
    }
}
