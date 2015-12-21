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

use App\User;

Route::get('/', function(){
	return view('home');
});
// Route::get('/', function(){
// 	return view('welcome');
// });
// Route::get('/',['middleware'=>'auth', function () {
//     return view('welcome');
// }]);

Route::group(['middleware' => 'auth'] , function() {
    //
    Route::get('/templates', 'TemplateController@index');
	Route::post('/template', 'TemplateController@store');
	Route::delete('/template/{template}', 'TemplateController@destroy');
});

// Route::get('/templates', 'TemplateController@index');
// Route::post('/template', 'TemplateController@store');
// Route::delete('/template/{template}', 'TemplateController@destroy');




// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('auth/facebook', 'Auth\AuthController@facebookRedirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@facebookHandleProviderCallback');

Route::get('auth/google', 'Auth\AuthController@googleRedirectToProvider');
Route::get('auth/google/callback', 'Auth\AuthController@googleHandleProviderCallback');

Route::get('auth/twitter', 'Auth\AuthController@twitterRedirectToProvider');
Route::get('auth/twitter/callback', 'Auth\AuthController@twitterHandleProviderCallback');