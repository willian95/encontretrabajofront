<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Region;

class RegionController extends Controller
{
    function fetch(){

        $regions = Region::all();
        return response()->json(["regions" => $regions]);

    }
}
