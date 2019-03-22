<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogSize extends Model
{
    protected $table = 'catalog_sizes';

    protected $fillable = ['name'];
    
    public function articles(){
		return $this->belongsToMany('App\CatalogArticle');
    }
    
    public function variants(){
		return $this->belongsToMany('App\CatalogVariants');
    }
    
    public function scopeSearchName($query, $name)
    {
        return $query->where('name','=', $name);
    }

}
