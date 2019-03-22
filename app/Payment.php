<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment_methods';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description', 'percent'];
    
    public function cart()
    {
    	return $this->hasOne('App\Cart');
    } 
    
    public function scopeSearchname($query, $name)
    {
        return $query->where('name','LIKE', "%$name%");
    }
}
