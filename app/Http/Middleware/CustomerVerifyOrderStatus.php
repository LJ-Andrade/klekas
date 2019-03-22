<?php

namespace App\Http\Middleware;

use App\Cart;
use Closure;

class CustomerVerifyOrderStatus
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
        $customerId = auth()->guard('customer')->user()->id;
        $activeCart = Cart::where('customer_id', $customerId)->where('status','Active')->get();
        if($activeCart->isEmpty() || $activeCart == null){
            return redirect('tienda');
        }
        return $next($request);
    }
}
