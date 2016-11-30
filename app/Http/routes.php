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

//Route::get('/', 'ListController@show');
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







//Route::get('test/{name}/{last}', 'ListController@test');

/*Route::get('/', function()
{
    $img = \Image::make('images/image1.jpeg')->resize(300, 200);
    
    return $img->response('jpeg');
});*/

