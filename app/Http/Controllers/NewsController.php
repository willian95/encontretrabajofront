<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;

class NewsController extends Controller
{
    function show($slug){

        $notice = Notice::where("slug", $slug)->first();

        return view("news", ["image" => $notice->image, "text" => $notice->text, "title" => $notice->title]);

    }
}
