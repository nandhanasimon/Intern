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
	//return 'hai der';
});

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

Route::get('/','HomeController@index');

Route::get('/listevent','HomeController@listevent');

Route::get('/eventdisplay/{numb}','HomeController@eventdisplay');

//Route::get('/bookevent','HomeController@bookevent');






//Route::get('test/{name}/{last}', 'ListController@test');

/*Route::get('/', function()
{
    $img = \Image::make('images/image1.jpeg')->resize(300, 200);
    
    return $img->response('jpeg');
});*/

