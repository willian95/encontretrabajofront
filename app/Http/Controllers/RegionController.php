<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;
use App\Commune;

class RegionController extends Controller
{
    function fetch(){

        $regions = Region::all();
        return response()->json(["regions" => $regions]);

    }

    function fetchCommune($id){

        $communes = Commune::where("region_id", $id)->get();
        return response()->json(["communes" => $communes]);

    }
}
