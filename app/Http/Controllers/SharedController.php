<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GeoLoc;

class SharedController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | CLIENT LOCATIONS
    |--------------------------------------------------------------------------
    */

    public function getGeoProvs()
    {
        $geoprovs = GeoProv::all();
        return response()->json([
            "success" => true,
            "items" => $geoprovs
        ]);
    }

    public function getGeoLocs($id)
    {
        
        $geolocs = GeoLoc::where('geoprov_id',$id)->get();
        // $geolocs->toArray();
        
        return response()->json([
            "success" => true,
            "geolocs" => $geolocs
        ]);
    }


}
