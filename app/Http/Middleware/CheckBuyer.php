<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckBuyer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next)
    {
        if (Auth::user()->buyer->data_status==0) {
            return redirect('buyer/profile');
        }

        return $next($request);
    }
}
