<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\GeneralException;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\RiskCalculator;
use App\Http\Controllers\Api\Traits\ApiResponse;
use App\Models\GrowTree;

class DashboardController
{
    use ApiResponse;

    /**
     * Request
     */
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    
    /**
     * @return json
     */
    public function index()
    {
        try {
            $bill = Bill::whereUserId(auth()->user()->id)->whereNot('status', 'paid')->latest()->first();
            $riskCalculators = RiskCalculator::get();
            
            $response['bill'] = $bill;
            $response['pairs'] = $riskCalculators->unique('pairs')->map->only('id', 'pairs');
            $response['risk_levels'] = $riskCalculators->unique('risk_level')->map->only('id', 'risk_level');
            $response['lots'] = $riskCalculators->unique('lot')->map->only('id', 'lot');

            return $this->respondWithSuccess('Data returned successfully!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }

    /**
     * @return json
     */
    public function getRiskCalculationDetails()
    {
        try {
            $rules = [
                'pairs' => ['required', 'string', 'max:199'],
                'risk_level' => ['required', 'string'],
                'lot' => ['required'],
            ];
    
            $validator = $this->validateParams($this->request->all(), $rules);
    
            if ($validator->fails()) {
                return $this->respondWithError($validator->errors()->first(), 200);
            }
    
            $pairs = $this->request->pairs;
            $risk_level = $this->request->risk_level;
            $lot = $this->request->lot;

            $risk_calculator = RiskCalculator::where('pairs', $pairs)->where('risk_level', $risk_level)->where('lot', $lot)->latest('created_at')->first();
            if(! $risk_calculator) {
                throw new GeneralException('No calculation found', 200);
            }

            $response['balance'] = formatAmount($risk_calculator->balance);
            $response['explanation'] = $risk_calculator->explanation;
    
            return $this->respondWithSuccess('Data returned successfully!', 200, $response);
            
        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
    
    /**
     * @return json
     */
    public function getGrowLevelDetails()
    {
        try {
            $grow_tree_details = GrowTree::with('level')->where('user_id', auth()->user()->id)->latest('created_at')->first();

            if($grow_tree_details) {
                $grow_tree_details->diagram_url = asset('storage/'.$grow_tree_details->diagram);
            }

            $response['grow_level'] = $grow_tree_details;
            $response['total_commission'] = formatAmount(getTotalCommission(auth()->user()->id));
            $response['unpaid_commission'] = formatAmount(getAvailableCommission(auth()->user()->id));
            $response['dt_code'] = auth()->user()->dt_code;
    
            return $this->respondWithSuccess('Data returned successfully!', 200, $response);
            
        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
}
