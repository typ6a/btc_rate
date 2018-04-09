<?php

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

Route::get('/', 'Rate\RateController@index');

Route::get('home', 'Rate\RateController@index');

Route::get('blockchain', function () {
    $controller = app()->make('App\Http\Controllers\Rate\RateController');
    app()->call([$controller, 'getBlockchainData'], []);
    Log::info(date("Y-m-d H:i:s") . ' data from BLOCKCHAIN provider saved using the web interface');
    return Redirect::back()->with('status', 'Last rate data has been got at ' . date("Y-m-d H:i:s") . ' with BLOCKCHAIN provider');
});

Route::get('/coindesk', function () {
    $controller = app()->make('App\Http\Controllers\Rate\RateController');
    app()->call([$controller, 'getCoindeskData'], []);
    Log::info(date("Y-m-d H:i:s") . ' data from BLOCKCHAIN provider saved using the web interface');
    return Redirect::back()->with('status', 'Last rate data has been got at ' . date("Y-m-d H:i:s") . ' with COINDESK provider');
});