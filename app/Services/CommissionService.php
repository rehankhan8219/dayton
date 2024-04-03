<?php

namespace App\Services;

use Exception;
use App\Models\Commission;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class CommissionService.
 */
class CommissionService extends BaseService
{
    /**
     * CommissionService constructor.
     *
     * @param  Commission  $commission
     */
    public function __construct(Commission $commission)
    {
        $this->model = $commission;
    }

    /**
     * @param  array  $data
     * @return Commission
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Commission
    {
        DB::beginTransaction();

        try {
            $commission = $this->model::create([
                'user_id' => $data['user_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'level' => $data['level'],
                'amount' => $data['amount'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('There was a problem creating the commission.'));
        }

        DB::commit();

        return $commission;
    }

    /**
     * @param  Commission  $commission
     * @param  array  $data
     * @return Commission
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Commission $commission, array $data = []): Commission
    {
        DB::beginTransaction();

        try {
            $commission->update([
                'user_id' => $data['user_id'],
                'start_date' => $data['start_date'],
                'end_date' => $data['end_date'],
                'level' => $data['level'],
                'amount' => $data['amount'],
            ]);
            
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the commission.'));
        }

        DB::commit();

        return $commission;
    }

    /**
     * @param  Commission  $commission
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Commission $commission): bool
    {
        if ($this->deleteById($commission->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the commission.'));
    }
}
