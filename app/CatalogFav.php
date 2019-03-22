<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogFav extends Model
{
    protected $table = "catalog_favs";

    protected $fillable = ['customer_id', 'article_id'];

    public function customer()
	{
	   	return $this->belongsTo('App\Customer', 'id');
    }
    
    public function article()
    {
        return $this->belongsTo('App\CatalogArticle');
    }
}
