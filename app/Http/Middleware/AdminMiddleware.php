<?php

namespace App\Http\Middleware;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'user')
    {
        $user = auth()->guard($guard)->user();
        if(!auth()->guard($guard)->check()){
            return redirect('/vadmin/login');
        }
        
        if($user->role == '1' || $user->role == '2')
        {
            return $next($request);
        } 
        else
        {
            return redirect('/vadmin')->with('message', 'Acceso no autorizado');
        }
    }
}
