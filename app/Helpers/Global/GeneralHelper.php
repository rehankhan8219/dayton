<?php

use Carbon\Carbon;
use App\Models\HelpCenter;

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
