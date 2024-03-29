<?php

namespace App\Services;

use App\Events\Withdrawal\WithdrawalCreated;
use Exception;
use App\Models\Withdrawal;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class WithdrawalService.
 */
class WithdrawalService extends BaseService
{
    /**
     * WithdrawalService constructor.
     *
     * @param  Withdrawal  $withdrawal
     */
    public function __construct(Withdrawal $withdrawal)
    {
        $this->model = $withdrawal;
    }

    /**
     * @param  array  $data
     * @return Withdrawal
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Withdrawal
    {
        DB::beginTransaction();

        try {
            $withdrawal = $this->model::create([
                'user_id' => $data['user_id'],
                'bank_name' => $data['bank_name'],
                'bank_account_number' => $data['bank_account_number'],
                'bank_account_name' => $data['bank_account_name'],
                'amount' => $data['amount'],
                'status' => $data['status'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the withdrawal.'));
        }

        DB::commit();

        event(new WithdrawalCreated($withdrawal));

        return $withdrawal;
    }

    /**
     * @param  Withdrawal  $withdrawal
     * @param  array  $data
     * @return Withdrawal
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Withdrawal $withdrawal, array $data = []): Withdrawal
    {
        DB::beginTransaction();

        try {
            $withdrawal->update([
                'user_id' => $data['user_id'],
                'bank_name' => $data['bank_name'],
                'bank_account_number' => $data['bank_account_number'],
                'bank_account_name' => $data['bank_account_name'],
                'amount' => $data['amount'],
                'status' => $data['status'],
            ]);
            
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the withdrawal.'));
        }

        DB::commit();

        return $withdrawal;
    }

    /**
     * @param  Withdrawal  $withdrawal
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Withdrawal $withdrawal): bool
    {
        if ($this->deleteById($withdrawal->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the withdrawal.'));
    }

    /**
     * @param  Withdrawal $withdrawal
     * @param $status
     * @return Withdrawal 
     *
     * @throws GeneralException
     */
    public function mark(Withdrawal $withdrawal, $status): Withdrawal
    {
        if($status == 1) {
            $withdrawal->status = 'paid';
        }
        
        if($status == 2) {
            $withdrawal->status = 'unpaid';
        }


        if ($withdrawal->save()) {
            // event(new UserStatusChanged($user, $status));

            return $withdrawal;
        }

        throw new GeneralException(__('There was a problem updating this withdrawal. Please try again.'));
    }
}
