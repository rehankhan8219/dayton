<?php

namespace App\Services;

use Exception;
use App\Services\BaseService;
use App\Models\RiskCalculator;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class RiskCalculatorService.
 */
class RiskCalculatorService extends BaseService
{
    /**
     * RiskCalculatorService constructor.
     *
     * @param  RiskCalculator  $riskcalculator
     */
    public function __construct(RiskCalculator $riskcalculator)
    {
        $this->model = $riskcalculator;
    }

    /**
     * @param  array  $data
     * @return RiskCalculator
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): RiskCalculator
    {
        DB::beginTransaction();

        try {
            $riskcalculator = $this->model::create([
                'pairs' => $data['pairs'],
                'risk_level' => $data['risk_level'],
                'lot' => $data['lot'],
                'balance' => $data['balance'],
                'explanation' => $data['explanation'],
            ]);

        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the riskcalculator.'));
        }

        DB::commit();

        return $riskcalculator;
    }

    /**
     * @param  RiskCalculator  $riskcalculator
     * @param  array  $data
     * @return RiskCalculator
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(RiskCalculator $riskcalculator, array $data = []): RiskCalculator
    {
        DB::beginTransaction();

        try {
            $riskcalculator->update([
                'pairs' => $data['pairs'],
                'risk_level' => $data['risk_level'],
                'lot' => $data['lot'],
                'balance' => $data['balance'],
                'explanation' => $data['explanation'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            throw new GeneralException(__('There was a problem updating the riskcalculator.'));
        }

        DB::commit();

        return $riskcalculator;
    }

    /**
     * @param  RiskCalculator  $riskcalculator
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(RiskCalculator $riskcalculator): bool
    {
        if ($this->deleteById($riskcalculator->id)) {
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the riskcalculator.'));
    }
}
