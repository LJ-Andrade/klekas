<?php

namespace App\Http\Middleware;
use Closure;
use Auth;

class CustomerActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'customer')
    {   
        if(auth()->guard($guard)->user() && auth()->guard($guard)->user()->status == 0){
            $request->session()->invalidate();
            auth()->guard()->logout();
        }
        return $next($request);
        
    }
}


