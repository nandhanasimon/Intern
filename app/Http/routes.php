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
Route::get('about', function () {
	return view('pages.about');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/profile','HomeController@profile');

Route::get('/updateprofile','HomeController@update');

Route::post('/store','HomeController@store');

Route::get('/addevent','HomeController@addevent');

Route::post('/storeevent','HomeController@storeevent');

Route::get('/','HomeController@homepage');

Route::get('/listevent','HomeController@listevent');

Route::get('/eventdisplay/{numb}','HomeController@eventdisplay');

Route::post('/bookevent/{num}','HomeController@bookevent');

Route::get('/updateevent/{num}','HomeController@updateevent');

Route::post('/storeupdateevent/{num}','HomeController@storeupdateevent');

Route::get('/deleteevent/{num}','HomeController@deleteevent');

Route::get('/addcity','admincontroller@addcity');

Route::post('/storecity','admincontroller@storecity');

Route::get('/showcity','admincontroller@showcity');

Route::get('/addvenue','admincontroller@addvenue');

Route::post('/storevenue','admincontroller@storevenue');

Route::get('/showvenue','admincontroller@showvenue');

Route::get('/showupdatecity/{num}','admincontroller@showupdatecity');

Route::post('/updatecity/{num}','admincontroller@updatecity');

Route::get('/deletecity/{num}','admincontroller@deletecity');

Route::get('/showupdatevenue/{id}','admincontroller@showupdatevenue');

Route::post('/updatevenue/{id}','admincontroller@updatevenue');

Route::get('/deletevenue/{id}','admincontroller@deletevenue');

Route::get('venue-list/{value}', 'HomeController@getVenues');
