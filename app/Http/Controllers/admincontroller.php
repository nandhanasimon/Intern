<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City;
use App\Venue;
use Illuminate\Support\Facades\View;

class admincontroller extends Controller
{
    //
    public function addcity()
    {
    	return view('admin.addcity');
    }

    public function storecity(Request $request)
    {

        echo "<br><br>";
        echo "<pre>";
    	$cit = new City;

    	$cit->city_name=$request->name;
    	$cit->save();
    	//return "saved";

    }

 public function showcity()
    {
       $cit= City::all();
        return View::make('admin.showcity',compact('cit'));

    }



}
