<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'email', 'notifications', 'reseller_money_min', 'reseller_min', 'google_analytics'];
}
