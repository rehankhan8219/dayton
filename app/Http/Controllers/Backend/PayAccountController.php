<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Models\PayAccount;
use App\Services\UserService;
use App\Services\LevelService;
use App\Services\PayAccountService;
use App\Http\Requests\PayAccount\EditPayAccountRequest;
use App\Http\Requests\PayAccount\StorePayAccountRequest;
use App\Http\Requests\PayAccount\DeletePayAccountRequest;
use App\Http\Requests\PayAccount\UpdatePayAccountRequest;

/**
 * Class PayAccountController.
 */
class PayAccountController
{
    /**
     * @var PayAccountService
     */
    protected $payAccountService;
    
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * PayAccountController constructor.
     *
     * @param  PayAccountService  $payAccountService
     * @param  UserService $userService
     * @param  LevelService $levelService
     */
    public function __construct(PayAccountService $payAccountService, UserService $userService)
    {
        $this->payAccountService = $payAccountService;
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.payaccount.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.payaccount.create')
            ->withUsers($this->userService->getByType(User::TYPE_USER));
    }

    /**
     * @param  StorePayAccountRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StorePayAccountRequest $request)
    {
        $this->payAccountService->store($request->validated());

        return redirect()->route('admin.payaccount.index')->withFlashSuccess(__('The payaccount was successfully created.'));
    }

    /**
     * @param  EditPayAccountRequest  $request
     * @param  PayAccount  $payaccount
     * @return mixed
     */
    public function edit(EditPayAccountRequest $request, PayAccount $payaccount)
    {
        return view('backend.payaccount.edit')
            ->withUsers($this->userService->getByType(User::TYPE_USER))
            ->withPayAccount($payaccount);
    }

    /**
     * @param  UpdatePayAccountRequest  $request
     * @param  PayAccount  $payaccount
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdatePayAccountRequest $request, PayAccount $payaccount)
    {
        $this->payAccountService->update($payaccount, $request->validated());

        return redirect()->route('admin.payaccount.index')->withFlashSuccess(__('The payaccount was successfully updated.'));
    }

    /**
     * @param  DeletePayAccountRequest  $request
     * @param  PayAccount  $payaccount
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(DeletePayAccountRequest $request, PayAccount $payaccount)
    {
        $this->payAccountService->destroy($payaccount);

        return redirect()->route('admin.payaccount.index')->withFlashSuccess(__('The payaccount was successfully deleted.'));
    }
}
