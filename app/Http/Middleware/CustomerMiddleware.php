<?php

namespace App\Http\Middleware;
use Closure;

class CustomerMiddleware
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
        if(!auth()->guard($guard)->check()){
            return redirect('/tienda');
        }
        if(auth()->guard($guard)->user()->status == 0){
            $request->session()->invalidate();
            return redirect('tienda/proceso');
        };
        
        return $next($request);
    }
}
