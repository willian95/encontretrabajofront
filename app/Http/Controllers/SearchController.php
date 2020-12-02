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

    function jobs(){
        return view("jobs");
    }

    function search(Request $request){

        try{

            $dataAmount = 18;
            $skip = ($request->page - 1) * $dataAmount;

            $search = "";
            if($request->search == null && $request->region == null){
                $search = "1=1";

                $offers = Offer::with("user", "region", "commune", "category")->has("category")->where("status", "abierto")
                ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
                ->take($dataAmount)
                ->orderBy("is_highlighted", "desc")
                ->orderBy("id", "desc")
                ->get();

                $offersCount = Offer::with("user", "region", "commune", "category")->has("category")
                ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
                ->orderBy("is_highlighted", "desc")
                ->orderBy("id", "desc")
                ->count();

                return response()->json(["success" => true, "offers" => $offers, "offersCount" => $offersCount, "dataAmount" => $dataAmount]);

            }

            $words = explode(' ',strtolower($request->search)); // coloco cada palabra en un espacio del array
            $wordsToDelete = array('de');

            $words = array_values(array_diff($words,$wordsToDelete));

            $offers = Offer::with("user")->with("region", "commune", "category")->has("user")
            ->where(function ($query) use($words, $request) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        //$query->orWhere('description', "like", "%".$words[$i]."%");
                        $query->orWhere('title', "like", "%".$words[$i]."%");
                        $query->orWhere('job_position', "like", "%".$words[$i]."%");
                        $query->orWhere('description', "like", "%".$words[$i]."%");

                        if(isset($request->region)){
                            $query->orWhere("region_id", $request->region);
                        }

                        if(isset($request->business)){
                            $query->orWhere("business_name", 'like', '%'.$request->business.'%');
                        }
                        
                    }
                }      
            })
            ->where("status", "abierto")
            ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
            ->take($dataAmount)
            ->orderBy("is_highlighted", "desc")
            ->orderBy("id", "desc");
            
            if(isset($request->category)){
                $offers->where("category_id", $request->category);
            }
        
            $offers = $offers->get();

            $offersCount = Offer::with("user")->with("region", "commune", "category")->has("user")
            ->where(function ($query) use($words, $request) {
                for ($i = 0; $i < count($words); $i++){
                    if($words[$i] != ""){
                        //$query->orWhere('description', "like", "%".$words[$i]."%");
                        $query->orWhere('title', "like", "%".$words[$i]."%");
                        $query->orWhere('job_position', "like", "%".$words[$i]."%");
                        $query->orWhere('description', "like", "%".$words[$i]."%");

                        if(isset($request->region)){
                            $query->orWhere("region_id", $request->region);
                        }

                        if(isset($request->business)){
                            $query->orWhere("business_name", 'like', '%'.$request->business.'%');
                        }
                        
                    }
                }      
            })
            ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
            ->orderBy("id", "desc");
            
            if(isset($request->category)){
                $offers->where("category_id", $request->category);
            }
        
            $offersCount = $offersCount->count();


            return response()->json(["success" => true, "offers" => $offers, "offersCount" => $offersCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Hubo un problema"]);
        }

    }

    function communeSearch(Request $request){

        try{

            $dataAmount = 18;
            $skip = ($request->page - 1) * $dataAmount;

            $offers = Offer::with("user", "commune", "region", "category")->has("user")
            ->where("commune_id", $request->communeSearch)
            ->where("status", "abierto")
            ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
            ->take($dataAmount)
            ->orderBy("id", "desc")
            ->get();

            $offersCount = Offer::with("user", "commune", "region", "category")->has("user")
            ->whereHas("user", function($query) use($request){

                $query->where("commune_id", $request->communeSearch);

            })
            ->where("status", "abierto")
            ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
            ->orderBy("id", "desc")
            ->count();

            return response()->json(["success" => true, "offers" => $offers, "offersCount" => $offersCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Hubo un problema"]);
        }

    }

    function categorySearch(Request $request){

        try{

            $dataAmount = 18;
            $skip = ($request->page - 1) * $dataAmount;

            $offers = Offer::with("user", "commune", "region", "category")->has("user")
            ->where("status", "abierto")
            ->where("category_id", $request->categorySearch)
            ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
            ->take($dataAmount)
            ->orderBy("is_highlighted", "desc")
            ->orderBy("id", "desc")
            ->get();

            $offersCount = Offer::with("user", "commune", "region", "category")->has("user")
            ->where("category_id", $request->categorySearch)
            ->where("status", "abierto")
            ->whereDate('expiration_date', '>', Carbon::today()->toDateString())
            ->orderBy("is_highlighted", "desc")
            ->orderBy("id", "desc")
            ->count();

            return response()->json(["success" => true, "offers" => $offers, "offersCount" => $offersCount, "dataAmount" => $dataAmount]);

        }catch(\Exception $e){

            return response()->json(["success" => false, "err" => $e->getMessage(), "ln" => $e->getLine(), "msg" => "Hubo un problema"]);
        }

    }
}
