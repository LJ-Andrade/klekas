<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\CustomerResetPasswordNotification;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Notifications\Notifiable;
use App\CatalogFav;
use App\Cart;

class Customer extends Authenticatable
{
    use Notifiable;
    
    protected $guard = 'customer';

    protected $table = 'customers';

    protected $fillable = [
        'name', 'surname', 'username', 'email', 'cuit', 'dni', 'address', 'geoprov_id', 'geoloc_id', 'cp', 'phone', 'phone2', 'password', 'group', 'status', 'avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPasswordNotification($token));
    }


    //Relations
    public function catalogFavs()
    {
    	return $this->hasMany(CatalogFav::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function geoprov()
    {
        return $this->belongsTo('App\GeoProv');
    }

    public function geoloc()
    {
        return $this->belongsTo('App\GeoLoc');
    }

    public function getCartAttribute()
    {
        $cart = $this->carts()->where('status', 'Active')->where('customer_id', $this->id)->orderBy('created_at', 'DESC')->first();
        if($cart){
            return $cart;
        } else {
            $cart = new Cart();
            $cart->status = 'Active';
            $cart->customer_id = $this->id;
            $cart->save(); 
            return $cart;
        }
    }

    // Search Scopes 
    public function scopeSearchname($query, $name)
    {
        $query->where('name', 'LIKE', "%$name%")
            ->orWhere('surname', 'LIKE', "%$name%")
            ->orWhere('username', 'LIKE', "%$name%")
            ->orWhere('email', 'LIKE', "%$name%");
    }

    public function scopeSearchGroup($query, $group)
    {
        $query->where('group', $group);
    }   

    public function scopeSearchGroupStatus($query, $group, $status)
    {
        $query->where('group', $group)->where('status', $status);
    }   


    /*
    |--------------------------------------------------------------------------
    | STATISTICS
    |--------------------------------------------------------------------------
    */

    public function staticstics($request)
    {
        switch ($request) {
            case "totalCarts":
                $return = $this->totalCarts();
                break;
            case "totalItems":
                $return = $this->totalItems();
                break;
            case "totalSpent":
            $return = $this->totalSpent();
                break;
            default:
            $return = null;
                break;
        }
        return $return;    
    }
    

    function totalItems()
    {
        $carts = $this->carts;
        $totalItems = 0;
        foreach($carts as $cart)
        {
            if($cart->status != "Active")
            {
                foreach($cart->items as $item)
                {
                    $totalItems += $item->quantity;
                }
            }
        }
        return $totalItems;
    }

    function totalSpent()
    {
        $carts = $this->carts;
        $totalSpent = 0;
        foreach($carts as $cart)
        {
            foreach($cart->items as $item)
            {
                $totalSpent += $item->final_price * $item->quantity;
            }
        }
        return $totalSpent;
    }    

    function totalCarts()
    {
        $carts = $this->carts;
        $totalCarts = 0;
        
        foreach($carts as $cart)
        {
            if($cart->status != "Active")
            {
                $totalCarts += 1;
            } 
        }
        return $totalCarts;
    }    

}
