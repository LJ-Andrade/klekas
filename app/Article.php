<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";

    protected $fillable = ['title', 'code', 'price', 'content', 'atribute1_id', 'category_id', 'user_id', 'status', 'slug'];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function images()
    {
    	return $this->hasMany('App\Image');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }

    public function scopeSearch($query, $title)
    {
        return $query->where('title', 'LIKE', "%$title%");
    }

    public function scopeSearchtitle($query, $title)
    {
        return $query->where('title', 'LIKE', "%$title%");
    }

}
