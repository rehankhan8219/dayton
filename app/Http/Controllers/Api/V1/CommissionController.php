<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Commission;
use App\Models\PayAccount;
use Illuminate\Http\Request;
use App\Services\CommissionService;
use Illuminate\Validation\Rule;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Api\Traits\ApiResponse;

class CommissionController
{
    use ApiResponse;

    /**
     * Request
     */
    protected $request;
    
    /**
     * CommissionService
     */
    protected $commissionService;

    /**
     * @param Request $request
     */
    public function __construct(Request $request, CommissionService $commissionService)
    {
        $this->request = $request;
        $this->commissionService = $commissionService;
    }
    
    /**
     * @return json
     */
    public function index()
    {
        try {
            $commissions = Commission::whereUserId(auth()->user()->id)->get();
            
            if($commissions->isEmpty()) {
                throw new GeneralException('No commissions added to your account yet!.', 200);
            }
            
            $response = [];
            foreach($commissions as $index => $commission) {
                $response[$index] = $commission->only('id', 'start_date', 'end_date', 'period', 'level', 'created_at');
                $response[$index]['amount'] = formatAmount($commission->amount);
            }

            return $this->respondWithSuccess('Data returned successfully!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
}
