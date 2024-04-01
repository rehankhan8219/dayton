<?php

namespace App\Services;

use Exception;
use App\Models\Bill;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class BillService.
 */
class BillService extends BaseService
{
    /**
     * BillService constructor.
     *
     * @param  Bill  $bill
     */
    public function __construct(Bill $bill)
    {
        $this->model = $bill;
    }

    /**
     * @param  array  $data
     * @return Bill
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Bill
    {
        DB::beginTransaction();

        try {
            $bill = $this->model::create([
                'user_id' => $data['user_id'],
                'broker_id' => $data['broker_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'due_date' => $data['due_date'],
                'amount' => $data['amount'],
                'details' => $data['details'] ?? null,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the bill.'));
        }

        DB::commit();

        return $bill;
    }

    /**
     * @param  Bill  $bill
     * @param  array  $data
     * @return Bill
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Bill $bill, array $data = []): Bill
    {
        DB::beginTransaction();

        try {
            $bill->update([
                'user_id' => $data['user_id'],
                'broker_id' => $data['broker_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'due_date' => $data['due_date'],
                'amount' => $data['amount'],
                'details' => $data['details'] ?? null,
            ]);
            
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the bill.'));
        }

        DB::commit();

        return $bill;
    }

    /**
     * @param  Bill  $bill
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Bill $bill): bool
    {
        if ($this->deleteById($bill->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the bill.'));
    }

    /**
     * @param  Bill $bill
     * @param $status
     * @return Bill 
     *
     * @throws GeneralException
     */
    public function mark(Bill $bill, $status): Bill
    {
        $bill->status = $status;
        
        if ($bill->save()) {
            return $bill;
        }

        throw new GeneralException(__('There was a problem updating this bill. Please try again.'));
    }
}
