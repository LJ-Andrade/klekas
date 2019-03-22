<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = ['name'];

    public function article()
    {
    	return $this->hasMany('App\Article');
    }

    public function scopeSearchCategory($query, $name)
    {
    	return $query->where('name','=', $name);
    }
    
    public function scopeSearchname($query, $name)
    {
        return $query->where('name','LIKE', "%$name%");
    }
}
