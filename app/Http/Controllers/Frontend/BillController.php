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
            $bank = PayAccount::select('*')->addSelect(\DB::raw('(SELECT SUBSTRING(`dt_code`, 3) from users where users.id = `from_user_id`) as `from_unique_code`, (SELECT SUBSTRING(`dt_code`, 3) from users where users.id = `to_user_id`) as `to_unique_code`'))->havingRaw($uniqueCode.' BETWEEN `from_unique_code` AND `to_unique_code`')->first();
        }

        if(! $bank) {
            return redirect()->route(homeRoute())->withFlashDanger('Pay now account is not added for you.');
        }
        
        $bills = Bill::whereUserId(auth()->user()->id)->where('status', 'unpaid')->get();
        
        if($bills->sum('amount') == 0) {
            return redirect()->route(homeRoute())->withFlashDanger('You dont have any unpaid bills');
        }
        
        $amount = sprintf("%.2f", $bills->sum('amount')).'.'.auth()->user()->unique_code;
        
        return view('frontend.bill.index')->withBank($bank)->withAmount($amount);
    }
    
    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $bills = Bill::whereUserId(auth()->user()->id)->where('status', 'unpaid')->get();

        Bill::whereIn('id', $bills->pluck('id'))->update(['status'  => 'processing']);

        return redirect()->route('frontend.bill.thanks');
    }

    public function showThanksPage()
    {
        return view('frontend.bill.thanks');
    }

    public function paymentHistory()
    {
        return view('frontend.bill.payment-history');
    }
}