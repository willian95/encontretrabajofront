<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Offer;

class SearchController extends Controller
{
    function index(){
        return view("search");
    }

    function search(Request $request){

        try{

            $words = explode(' ',strtolower($request->job_search)); // coloco cada palabra en un espacio del array
            $wordsToDelete = array('de');

            $words = array_values(array_diff($words,$wordsToDelete));

            $dataAmount = 18;
            $skip = ($request->page - 1) * $dataAmount;

            $offers = Offer::with("user")->has("user")
            ->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        //$query->orWhere('description', "like", "%".$words[$i]."%");
                        $query->orWhere('title', "like", "%".$words[$i]."%");
                        $query->orWhere('job_position', "like", "%".$words[$i]."%");
                        $query->orWhere('description', "like", "%".$words[$i]."%");
                        
                    }
                }      
            })
            ->whereHas("user", function($query) use($request){

                $query->where("region_id", $request->region_id);

            })
            ->where("status", "abierto")
            ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
            ->take($dataAmount)
            ->orderBy("id", "desc")
            ->get();

            $offersCount = Offer::with("user")->has("user")
            ->where(function ($query) use($words) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        //$query->orWhere('description', "like", "%".$words[$i]."%");
                        $query->orWhere('title', "like", "%".$words[$i]."%");
                        $query->orWhere('job_position', "like", "%".$words[$i]."%");
                        $query->orWhere('description', "like", "%".$words[$i]."%");
                        
                    }
                }      
            })
            ->whereHas("user", function($query) use($request){

                $query->where("region_id", $request->region_id);

            })
            ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
            ->orderBy("id", "desc")
            ->count();

            return response()->json(["success" => true, "offers" => $offers, "offersCount" => $offersCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Hubo un problema"]);
        }

    }
}