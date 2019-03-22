<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogVariant extends Model
{
    protected $table = "catalog_variants";

    protected $fillable = ['article_id', 'combination', 'color_id', 'size_id', 'price', 'discount', 'stock'];

    public function article()
    {
    	return $this->belongsTo('App\Article');
    }

    public function color(){
    	return $this->belongsTo('App\CatalogColor', 'color_id');
    }

    public function cartItems(){
    	return $this->hasMany('App\CatalogItem');
    }

    public function size()
    {
        return $this->belongsTo('App\CatalogSize', 'size_id');
    }

}
