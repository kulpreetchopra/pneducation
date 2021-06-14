<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class FrontLogin
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
        if (empty(Session::has('kulpreet'))) {
            return redirect('/user_login')->with('wmessage',"You are not login as Admin login first to reach 'Admin Dashboard' !!");;
            }
        return $next($request);
    }
}
