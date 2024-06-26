<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class SuperAdminCheck.
 */
class SuperAdminCheck
{
    /**
     * @param $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->hasAllAccess()) {
            return $next($request);
        }

        return redirect()->route('frontend.page.home')->withFlashDanger(__('You do not have access to do that.'));
    }
}
