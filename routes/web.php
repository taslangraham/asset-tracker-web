<?php

use Illuminate\Support\Facades\Route;

use App\models\Beacon;
use App\models\Location;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::resource('vendors', 'VendorController');
    Route::resource('manufacturers', 'ManufacturerController');
    Route::resource('beacons', 'BeaconController');
    Route::resource('locations', 'LocationController');
    Route::resource('statuses', 'StatusController');
    Route::resource('assets', 'AssetController');
});
