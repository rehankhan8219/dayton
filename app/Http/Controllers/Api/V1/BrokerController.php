<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Bill;
use App\Models\Broker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Api\Traits\ApiResponse;
use App\Services\BrokerService;

class BrokerController
{
    use ApiResponse;

    /**
     * Request
     */
    protected $request;
    
    /**
     * BrokerService
     */
    protected $brokerService;

    /**
     * @param Request $request
     */
    public function __construct(Request $request, BrokerService $brokerService)
    {
        $this->request = $request;
        $this->brokerService = $brokerService;
    }
    
    /**
     * @return json
     */
    public function index()
    {
        try {
            $brokers = Broker::where('user_id', auth()->user()->id)->latest()->get();

            if($brokers->isEmpty()) {
                return $this->respondWithSuccess('No borkers added yet!', 200);
            }

            $response = [];

            foreach($brokers as $index => $broker) {
                $response[$index] = $broker->only('id', 'broker_id', 'broker_server', 'broker_password', 'pairs', 'risk_level', 'lot', 'active');
            }

            return $this->respondWithSuccess('Data returned successfully!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
    
    /**
     * @return json
     */
    public function store()
    {
        try {
            $rules = [
                'broker_id' => ['required', 'string', 'max:199', Rule::unique('brokers')],
                'broker_server' => ['required', 'string', 'max:199'],
                'broker_password' => ['required', 'string', 'max:199'],
                'pairs' => ['required', 'string', 'max:199'],
                'risk_level' => ['required', 'string'],
                'lot' => ['required']
            ];

            $validator = $this->validateParams($this->request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->respondWithError($validator->errors()->first(), 200);
            }

            $data = $validator->valid();
            $data['user_id'] = auth()->user()->id;
            $broker = $this->brokerService->store($data);
            
            return $this->respondWithSuccess('Broker added successfully!', 200);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
    
    /**
     * @param Broker $broker
     * 
     * @return json
     */
    public function update(Broker $broker)
    {
        try {
            $rules = [
                'broker_id' => ['required', 'string', 'max:199', Rule::unique('brokers')->ignore($broker->id)],
                'broker_server' => ['required', 'string', 'max:199'],
                'broker_password' => ['required', 'string', 'max:199'],
                'pairs' => ['required', 'string', 'max:199'],
                'risk_level' => ['required', 'string'],
                'lot' => ['required'],
            ];

            $validator = $this->validateParams($this->request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->respondWithError($validator->errors()->first(), 200);
            }

            $data = $validator->valid();
            $data['user_id'] = auth()->user()->id;
            $broker = $this->brokerService->update($broker, $data);
            
            return $this->respondWithSuccess('Broker updated successfully!', 200);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
}
