<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserMiddleware
{
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    private $customer;
    public function __construct()
    {
        # code...
    }
    
     public function handle(Request $request, Closure $next, $guard = 'customer')
    {
        if(Auth::guard($guard)->check()){
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'Bạn chưa đăng nhập');
    }
}
