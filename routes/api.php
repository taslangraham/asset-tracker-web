<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\Location as LocationResource;
use App\Http\Resources\Beacon as BeaconResource;
use App\models\Beacon;
use App\models\Location;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/locations", function () {
    return LocationResource::collection((Location::all()));
});


Route::get("/beacon", function () {
    return BeaconResource::collection((Beacon::all()));
});

Route::post("/beacon", function (Request $request) {
    // dd($request->id);
    return Beacon::create($request->all());
});


Route::put("/beacon/update/", 'BeaconController@update');
