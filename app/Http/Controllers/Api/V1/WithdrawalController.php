<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Services\WithdrawalService;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Api\Traits\ApiResponse;

class WithdrawalController
{
    use ApiResponse;

    /**
     * Request
     */
    protected $request;
    
    /**
     * WithdrawalService
     */
    protected $withdrawalService;

    /**
     * @param Request $request
     */
    public function __construct(Request $request, WithdrawalService $withdrawalService)
    {
        $this->request = $request;
        $this->withdrawalService = $withdrawalService;
    }
    
    /**
     * @return json
     */
    public function index()
    {
        try {
            $withdrawals = auth()->user()->withdrawals()->latest()->get();

            if($withdrawals->isEmpty()) {
                throw new GeneralException('You have not requested for withdrawal yet!', 200);
            }

            $response = [];
            foreach($withdrawals as $index => $withdrawal) {
                $response[$index] = $withdrawal->only('id', 'bank_name', 'bank_account_number', 'bank_account_name', 'status', 'created_at');
                $response[$index]['amount'] = formatAmount($withdrawal->amount);
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
                'bank_name' => 'required|string|max:191',
                'bank_account_name' => 'required|string|max:191',
                'bank_account_number' => 'required|numeric',
                'amount' => 'required|numeric',
            ];

            $validator = $this->validateParams($this->request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->respondWithError($validator->errors()->first(), 200);
            }

            $availableCommission = getAvailableCommission(auth()->user()->id);
            if($availableCommission < $this->request->amount) {
                return $this->respondWithError(__('You can not request the amount higher than available commission. Your available commission is IDR '.$availableCommission), 200);
            }

            $data = $validator->valid();
            $data['user_id'] = auth()->user()->id;
            $data['status'] = 'processing';

            $this->withdrawalService->store($data);

            return $this->respondWithSuccess('Withdrawal added successfully!', 200);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
}
