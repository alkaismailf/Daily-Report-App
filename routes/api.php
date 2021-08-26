<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('reportall', 'apiController@getReport');
Route::post('reportall/add', 'apiController@addReport');
Route::put('reportall/update/{id_report}', 'apiController@updateReport');
Route::delete('reportall/delete/{id_report}', 'apiController@deleteReport');
