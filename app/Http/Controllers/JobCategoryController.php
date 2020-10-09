<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobCategory;

class JobCategoryController extends Controller
{
    
    function fetch(){

        $categories = JobCategory::all();
        return response()->json(["categories" => $categories]);

    }

}
