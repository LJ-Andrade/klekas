<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeoProv extends Model
{
    protected $table = 'geoprovs';

    protected $primaryKey = 'id';

    protected $fillable = ['name'];
    
    public function geolocs()
    {
        return $this->hasMany('App\GeoLoc');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

}