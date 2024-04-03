<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Traits\ApiResponse;

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
            
            $response['bill'] = $bill;
            $response['pairs'] = getUniquePairs();
            $response['risk_levels'] = getUniqueRiskLevel();
            $response['lots'] = getUniqueLot();

            return $this->respondWithSuccess('Data returned successfully!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
}
