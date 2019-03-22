<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class StoreServiceProvider extends ServiceProvider
{
    
    public function boot(View $view)
    {
        //View::composer(['store'], 'App\Http\ViewComposers\ShowCatTagsAtrib');
    }
    
    public function register()
    {
        $this->composeStore();
    }
    
    public function composeStore()
    {
        View::composer([
            'store.partials.main',
            'store.index', 
            'store.checkout',
            'store.checkout-final',
            'store.checkout-last',
            'store.checkout-mp',
            'store.customer-active-cart',
            'store.customer-account',
            'store.customer-wishlist',
            'store.customer-orders',
            'store.customer-order',
            'store.checkout-success',
            'store.show',
            'store.buy-conditions',
            'store.how-to-buy',
            'store.reseller-policy',
            'store.cartdetail',
            'store.wishlist'
        ], 'App\Http\ViewComposers\StoreComposer');
    }
}
