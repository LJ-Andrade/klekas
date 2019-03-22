<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description', 'zone', 'delivery_time', 'price'];

    public function cart()
    {
        return $this->hasOne('App\Cart', 'shipping_id');
    }

    public function scopeSearchname($query, $name)
    {
        return $query->where('name','LIKE', "%$name%");
    }

}
