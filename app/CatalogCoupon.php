<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatalogCoupon extends Model
{
    protected $table = 'catalog_coupons';

    protected $primaryKey = 'id';

    protected $fillable = ['code', 'init_date', 'expire_date', 'status', 'reseller', 'percent'];

    public function scopeSearchcode($query, $code)
    {
        return $query->where('code','LIKE', "%$code%");
    }
}
