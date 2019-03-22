<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogBrand extends Model
{
    protected $table = "catalog_brands";

    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany('App\CatalogArticle');
    }

    public function scopeSearchname($query, $name)
    {
        return $query->where('name','LIKE', "%$name%");
    }
}
