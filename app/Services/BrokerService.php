<?php

namespace App\Services;

use App\Events\Broker\BrokerCreated;
use App\Events\Broker\BrokerDeleted;
use App\Events\Broker\BrokerUpdated;
use Exception;
use App\Models\Broker;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;

/**
 * Class BrokerService.
 */
class BrokerService extends BaseService
{
    /**
     * BrokerService constructor.
     *
     * @param  Broker  $broker
     */
    public function __construct(Broker $broker)
    {
        $this->model = $broker;
    }

    /**
     * @param  array  $data
     * @return Broker
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Broker
    {
        DB::beginTransaction();

        try {
            $broker = $this->model::create([
                'user_id' => $data['user_id'],
                'broker_id' => $data['broker_id'],
                'broker_server' => $data['broker_server'],
                'broker_password' => $data['broker_password'],
                'pairs' => $data['pairs'],
                'risk_calculator_id' => $data['risk_calculator_id'],
                'lot' => $data['lot'],
                // 'active' => isset($data['active']) && $data['active'] === '1',
                'active' => $data['active'] ?? 0,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem creating the broker.'));
        }

        DB::commit();

        event(new BrokerCreated($broker));

        return $broker;
    }

    /**
     * @param  Broker  $broker
     * @param  array  $data
     * @return Broker
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(Broker $broker, array $data = []): Broker
    {
        DB::beginTransaction();

        try {
            $broker->update([
                'user_id' => $data['user_id'],
                'broker_id' => $data['broker_id'],
                'broker_server' => $data['broker_server'],
                'broker_password' => $data['broker_password'],
                'pairs' => $data['pairs'],
                'risk_calculator_id' => $data['risk_calculator_id'],
                'lot' => $data['lot'],
                // 'active' => isset($data['active']) && $data['active'] === '1',
                'active' => $data['active'] ?? 0,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('There was a problem updating the broker.'));
        }

        DB::commit();

        event(new BrokerUpdated($broker));

        return $broker;
    }

    /**
     * @param  Broker  $broker
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Broker $broker): bool
    {
        if ($this->deleteById($broker->id)) {
            event(new BrokerDeleted($broker));
            return true;
        }

        throw new GeneralException(__('There was a problem deleting the broker.'));
    }
}
