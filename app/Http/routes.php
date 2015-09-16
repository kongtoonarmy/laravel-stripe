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

Route::get('/', ['as' => 'home', function () {
    return view('welcome');
}]);

Route::get('/payment', 'PaymentController@index');

Route::get('/charge/create', 'ChargeController@create');
Route::post('/charge/store', 'ChargeController@store');
Route::get('/charge/show/{id}', 'ChargeController@show');
Route::get('/charge/capture/{id}', 'ChargeController@capture');

Route::resource('cards', 'CardController');

/*Route::get('/account', 'AccountController@index');
Route::get('/account/create', 'AccountController@create');
Route::post('/account/store', 'AccountController@store');
Route::delete('/account/destroy/{accountId}', 'AccountController@destroy');	
Route::get('/account/{id}', 'AccountController@show');	
Route::get('/account/{id}/edit', 'AccountController@edit');	*/
Route::resource('accounts', 'AccountController');
Route::resource('accounts.cards', 'AccountCardController');

Route::get('/customer/create', 'CustomerController@create');
Route::get('/customer/show/{customerID}', 'CustomerController@show');
Route::post('/customer/store', 'CustomerController@store');

Route::get('macbook', ['as' => 'macbook', function() {
	return 'Hello macbook page';
}]);