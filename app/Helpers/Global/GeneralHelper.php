<?php

use Carbon\Carbon;
use App\Models\HelpCenter;
use App\Models\Bill;
use App\Models\Commission;
use App\Models\RiskCalculator;
use App\Models\Withdrawal;

if (!function_exists('appName')) {
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

if (!function_exists('carbon')) {
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

if (!function_exists('homeRoute')) {
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

        if (request()->routeIs('admin.*')) {
            return 'admin.auth.login';
        }

        return 'frontend.page.home';
    }
}

if (!function_exists('getHelpCenterDetailsFromCategory')) {
    function getHelpCenterDetailsFromCategory($category_id)
    {
        $help_centers = HelpCenter::where('help_category_id', $category_id)->get();

        return $help_centers;
    }
}

if (!function_exists('getUniquePairs')) {
    function getUniquePairs($plain = false)
    {
        if ($plain)
            $pairs_list = RiskCalculator::pluck('pairs', 'pairs')->unique()->toArray();
        else 
            $pairs_list = RiskCalculator::pluck('pairs', 'id')->unique()->toArray();

        return $pairs_list;
    }
}

if (!function_exists('getUniqueRiskLevel')) {
    function getUniqueRiskLevel($plain = false)
    {
        if ($plain)
            $risk_level_list = RiskCalculator::pluck('risk_level', 'risk_level')->unique()->toArray();
        else 
            $risk_level_list = RiskCalculator::pluck('risk_level', 'id')->unique()->toArray();
        
        return $risk_level_list;
    }
}

if (!function_exists('getUniqueLot')) {
    function getUniqueLot($plain = false)
    {
        if ($plain)
            $lot_list = RiskCalculator::pluck('lot', 'lot')->unique()->toArray();
        else 
            $lot_list = RiskCalculator::pluck('lot', 'id')->unique()->toArray();
        
        return $lot_list;
    }
}

if (!function_exists('getAvailableCommission')) {
    function getAvailableCommission($userId)
    {
        $totalCommission = getTotalCommission($userId);
        $totalWithdrawal = Withdrawal::where('user_id', $userId)->whereNot('status', 'unpaid')->get()->sum('amount');

        return sprintf("%.2f", $totalCommission - $totalWithdrawal);
    }
}

if (!function_exists('getTotalCommission')) {
    function getTotalCommission($userId)
    {
        return sprintf("%.2f", Commission::where('user_id', $userId)->get()->sum('amount'));
    }
}

if (!function_exists('formatAmount')) {
    function formatAmount($amount)
    {
        return number_format($amount, 0, ',', '.');
    }
}
