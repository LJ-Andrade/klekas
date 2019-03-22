<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeoLoc extends Model
{
    protected $table = 'geolocs';

    protected $primaryKey = 'id';

    protected $fillable = ['name', 'province_id'];
    
    public function geoprov()
    {
        return $this->belongsTo('App\GeoProv');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer');
    }

}
