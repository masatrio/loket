<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => ['cors']], function() {

  Route::get('/user/show', 'UserController@show');
	Route::post('/user/create', 'UserController@store');
	Route::put('/user', 'UserController@update');
	Route::delete('/user', 'UserController@destroy');
  //create location
  Route::post('/location/create', 'LocationController@create');
  Route::post('/event/create', 'EventController@create');
  Route::post('/event/ticket/create', 'TicketController@create');
  Route::get('/event/get_info', 'EventController@show');
  Route::post('/transaction/purchase', 'TransactionController@create');
});
