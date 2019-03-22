<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";

    protected $fillable = ['name'];

    public function article(){
		return $this->belongsToMany('App\Article');
	}

	public function scopeSearch($query, $name)
	{
		return $query->where('name', 'LIKE', "%$name%");
	}

	public function scopeSearchTag($query, $name)
    {
    	return $query->where('name','=', $name);
	}
	
	public function scopeSearchname($query, $name)
    {
        return $query->where('name','LIKE', "%$name%");
    }


}	
