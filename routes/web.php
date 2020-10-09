<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/search", "SearchController@index");
Route::get("/jobs", "SearchController@jobs");
Route::post("/search", "SearchController@search");

Route::post("/search/commune", "SearchController@communeSearch");

Route::get("/jobs", "JobController@index");
Route::post("/jobs", "JobController@getOffers");

Route::get("/regions/all", "RegionController@fetch");

Route::get("/job-categories/all", "JobCategoryController@fetch");