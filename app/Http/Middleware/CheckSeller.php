<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckSeller
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
        if (Auth::user()->seller->data_status==0) {
            return redirect('seller/profile');
        }

        return $next($request);
    }
}
