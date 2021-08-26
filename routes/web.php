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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/report', 'ReportController@index')->name('report');
Route::get('/reportall', 'ReportController@indexall')->name('reportall');
Route::post('/report/create', 'ReportController@create');
Route::get('/report/{id}/detail', 'ReportController@detail');
Route::get('/report/{id}/edit', 'ReportController@edit');
Route::post('/report/{id}/update', 'ReportController@update');
Route::get('/report/{id}/delete', 'ReportController@delete');



Route::get('/', 'authController@showFormLogin')->name('login');
Route::get('login', 'authController@showFormLogin')->name('login');
Route::post('login', 'authController@login');
Route::get('register', 'authController@showFormRegister')->name('register');
Route::post('register', 'authController@register');
 
Route::group(['middleware' => 'auth'], function () {
    // Route::get('home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/profile/{id}/edit', 'ProfileController@edit');
    Route::post('/profile/{id}/update', 'ProfileController@update');
    Route::get('/profile/{id}/changepassword', 'ProfileController@changePassword');
    Route::post('/profile/{id}/updatepassword', 'ProfileController@updatePassword');

    Route::get('logout', 'authController@logout')->name('logout');
});