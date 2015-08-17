<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/payment', 'PaymentController@index');

Route::post('/stripe', 'StripeController@index');
Route::get('/stripe/create-charge', 'StripeController@createCharge');

Route::get('/user/create', 'UserController@create');
Route::get('/user/show/{customerID}', 'UserController@show');
Route::post('/user/store', 'UserController@store');