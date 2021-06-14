<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AccountLogin
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
        if (empty(Session::has('ashu'))) {
            return redirect('/user_login')->with('wmessage',"You are not login as User, login first to purchase Courses or to check 'Account Details'!!");
            }
        return $next($request);
    }
}
