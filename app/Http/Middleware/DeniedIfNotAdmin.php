<?php

namespace ShoppingSpout\Http\Middleware;

use Closure;
use Auth;
use Session;

class DeniedIfNotAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param string $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'admin_user')
    {
        //echo Auth::guard('admin_user')->User()->sms_code; exit;
       
        if(!Auth::guard($guard)->check()){
            return redirect('admin/login');
        }elseif(Auth::guard($guard)->check() && empty(Auth::guard('admin_user')->User()->is_login)) {
            return redirect('admin/verifytoken');
        }
        return $next($request);
    }
}
