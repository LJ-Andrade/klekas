<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogImage extends Model
{
    protected $table = "catalog_images";

    protected $fillable = ['name', 'featured', 'thumb', 'article_id'];

	public function article()
	{
	   	return $this->belongsTo('App\CatalogArticle');
	}

}
