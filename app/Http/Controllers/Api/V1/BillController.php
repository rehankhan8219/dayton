<?php

namespace App\Http\Controllers\Api\V1;

use App\Exceptions\GeneralException;
use App\Models\Bill;
use Illuminate\Http\Request;
use App\Services\BillService;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Api\Traits\ApiResponse;
use App\Models\PayAccount;

class BillController
{
    use ApiResponse;

    /**
     * Request
     */
    protected $request;
    
    /**
     * BillService
     */
    protected $billService;

    /**
     * @param Request $request
     */
    public function __construct(Request $request, BillService $billService)
    {
        $this->request = $request;
        $this->billService = $billService;
    }
    
    /**
     * @return json
     */
    public function index()
    {
        try {
            $uniqueCode = auth()->user()->unique_code;
        
            if($uniqueCode) {
                $bank = PayAccount::select('*')->addSelect(\DB::raw('(SELECT SUBSTRING(`dt_code`, 3) from users where users.id = `from_user_id`) as `from_unique_code`, (SELECT SUBSTRING(`dt_code`, 3) from users where users.id = `to_user_id`) as `to_unique_code`'))->havingRaw('"'.$uniqueCode.'" BETWEEN `from_unique_code` AND `to_unique_code`')->first();
            }

            if(empty($bank)) {
                throw new GeneralException('Pay now account is not added for you.', 200);
            }
            
            $bill = Bill::whereUserId(auth()->user()->id)->where('status', 'unpaid')->latest()->first();
            
            if(! $bill) {
                throw new GeneralException('You dont have any unpaid bills.', 200);
            }
            
            $response['bank'] = $bank->only('bank', 'bank_account', 'bank_account_name');
            $response['amount'] = formatAmount($bill->amount);

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
            $bill = Bill::whereUserId(auth()->user()->id)->where('status', 'unpaid')->latest()->first();

            if(! $bill) {
                throw new GeneralException('You dont have any unpaid bills.', 200);
            }


            $bill->status = 'processing';
            $bill->save();

            activity('member')
                ->performedOn($bill)
                ->log(auth()->user()->name.' has done payment'); 

            return $this->respondWithSuccess('Bill added successfully!', 200);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
    
    /**
     * @return json
     */
    public function paymentHistory()
    {
        try {
            $bills = Bill::where('user_id', auth()->user()->id)->whereIn('status', ['paid', 'processing'])->latest()->get();
            
            if($bills->isEmpty()) {
                throw new GeneralException('No payment transaction found!', 200);
            }

            $response = [];
            foreach($bills as $index => $bill) 
            {
                $response[$index] = $bill->only('id', 'start_date', 'end_date', 'due_date', 'details', 'status', 'period', 'created_at');
                $response[$index]['amount'] = formatAmount($bill->amount);
            }

            return $this->respondWithSuccess('Data returned successfully!', 200, $response);

        } catch (\Throwable $th) {
            return $this->respondWithError($th->getMessage(), (!empty($th->getCode())? $th->getCode() : 500));
        }
    }
}
