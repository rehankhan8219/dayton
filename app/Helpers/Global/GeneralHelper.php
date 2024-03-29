<?php

use Carbon\Carbon;
use App\Models\HelpCenter;
use App\Models\Bill;
use App\Models\RiskCalculator;



if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'Laravel Boilerplate');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     * @return Carbon
     *
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isUser()) {
                return 'frontend.member.home';
            }
        }

        if(request()->routeIs('admin.*')) {
            return 'admin.auth.login';
        }
        
        return 'frontend.page.home';
    }
}

if (! function_exists('getHelpCenterDetailsFromCategory')) {
    function getHelpCenterDetailsFromCategory($category_id)
    {
       $help_centers = HelpCenter::where('help_category_id', $category_id)->get();

       return $help_centers;
    }
}

if (! function_exists('getBrokerBillDetails')) {
    function getBrokerBillDetails($broker_id)
    {
       $broker_bill_details =  [];
       
       $start_date_bill_details = Bill::where('broker_id', $broker_id)->oldest('start_date')->first();
       $end_date_bill_details = Bill::where('broker_id', $broker_id)->latest('end_date')->first();
       $due_date_bill_details = Bill::where('broker_id', $broker_id)->latest('due_date')->first();

       $bill_amount = Bill::where('broker_id', $broker_id)->sum('amount');

       if(!empty($start_date_bill_details)){
            $broker_bill_details['start_date'] = $start_date_bill_details->start_date;
       }

       if(!empty($end_date_bill_details)){
            $broker_bill_details['end_date'] = $end_date_bill_details->end_date;
       }

       if(!empty($due_date_bill_details)){
            $broker_bill_details['due_date'] = $due_date_bill_details->due_date;
       }

       if(!empty($bill_amount)){
            $broker_bill_details['amount'] = $bill_amount;
       }

       return $broker_bill_details;
    }
}

if (! function_exists('getUniquePairs')) {
    function getUniquePairs()
    {
       $pairs_list = RiskCalculator::pluck('pairs', 'id')->unique()->toArray();
       return $pairs_list;
    }
}

if (! function_exists('getUniqueRiskLevel')) {
    function getUniqueRiskLevel()
    {
       $risk_level_list = RiskCalculator::pluck('risk_level', 'id')->unique()->toArray();
       return $risk_level_list;
    }
}

if (! function_exists('getUniqueLot')) {
    function getUniqueLot()
    {
       $lot_list = RiskCalculator::pluck('lot', 'id')->unique()->toArray();
       return $lot_list;
    }
}


