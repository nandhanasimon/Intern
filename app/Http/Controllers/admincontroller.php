<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City;
use App\Venue;
//use Illuminate\Support\Facades\View;

class admincontroller extends Controller
{
    //
    public function addcity()
    {
    	return view('admin.addcity');
    }

    public function storecity(Request $request)
    {

    	$city = new City;

    	$city->city_name=$request->name;
    	$city->save();
    	return "saved";

    }
}
