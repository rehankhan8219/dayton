<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Bill;
use App\Models\PayAccount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * @return Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $uniqueCode = auth()->user()->unique_code;
        
        if($uniqueCode) {
            $bank = PayAccount::select('*')->addSelect(\DB::raw('(SELECT SUBSTRING(`dt_code`, 3) from users where users.id = `from_user_id`) as `from_unique_code`, (SELECT SUBSTRING(`dt_code`, 3) from users where users.id = `to_user_id`) as `to_unique_code`'))->havingRaw('"'.$uniqueCode.'" BETWEEN `from_unique_code` AND `to_unique_code`')->first();
        }

        if(empty($bank)) {
            return redirect()->route(homeRoute())->withFlashDanger('Pay now account is not added for you.');
        }
        
        $bill = Bill::whereUserId(auth()->user()->id)->where('status', 'unpaid')->latest()->first();
        
        if(! $bill) {
            return redirect()->route(homeRoute())->withFlashDanger('You dont have any unpaid bills');
        }
        
        $amount = $bill->amount;
        
        return view('frontend.bill.index')->withBank($bank)->withAmount($amount);
    }
    
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $bill = Bill::whereUserId(auth()->user()->id)->where('status', 'unpaid')->latest()->first();

        if($bill) {
            $bill->status = 'processing';
            $bill->save();

            activity('member')
            ->performedOn($bill)
            ->log(auth()->user()->name.' has done payment'); 

            return redirect()->route('frontend.bill.thanks');
        }

        return redirect()->back()->withFlashDanger('You dont have any unpaid bills');

    }

    public function showThanksPage()
    {
        return view('frontend.bill.thanks');
    }

    public function paymentHistory()
    {
        $bills = Bill::where('user_id', auth()->user()->id)->whereIn('status', ['paid', 'processing'])->latest()->get();

        return view('frontend.bill.payment-history', compact('bills'));
    }
}