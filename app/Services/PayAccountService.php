<?php

namespace App\Services;

use Exception;
use App\Models\PayAccount;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class PayAccountService.
 */
class PayAccountService extends BaseService
{
    /**
     * PayAccountService constructor.
     *
     * @param  PayAccount  $payaccount
     */
    public function __construct(PayAccount $payaccount)
    {
        $this->model = $payaccount;
    }

    /**
     * @param  array  $data
     * @return PayAccount
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PayAccount
    {
        DB::beginTransaction();

        try {
            $payaccount = $this->model::create([
                'from_user_id' => $data['from_user_id'],
                'to_user_id' => $data['to_user_id'],
                'bank' => $data['bank'],
                'bank_account' => $data['bank_account'],
                'bank_account_name' => $data['bank_account_name'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();
dd($e);
            throw new GeneralException(__('There was a problem creating the payaccount.'));
        }

        DB::commit();

        return $payaccount;
    }

    /**
     * @param  PayAccount  $payaccount
     * @param  array  $data
     * @return PayAccount
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(PayAccount $payaccount, array $data = []): PayAccount
    {
        DB::beginTransaction();

        try {
            $payaccount->update([
                'from_user_id' => $data['user_id'],
                'to_user_id' => $data['to_user_id'],
                'bank' => $data['bank'],
                'bank_account' => $data['bank_account'],
                'bank_account_name' => $data['bank_account_name'],
            ]);
            
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the payaccount.'));
        }

        DB::commit();

        return $payaccount;
    }

    /**
     * @param  PayAccount  $payaccount
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PayAccount $payaccount): bool
    {
        if ($this->deleteById($payaccount->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the payaccount.'));
    }
}
