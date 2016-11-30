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
    	//return "SHOW CITY PAGE";
       $cit= City::all();
       return View::make('admin.showcity',compact('cit'));

    }



    public function addvenue()
    {
    	return view('admin.addvenue');
    }

    public function storevenue(Request $request)
    {
    	echo "<br><br>";
        echo "<pre>";
    	$t = new Venue;
    	$t->vname=$request->name;
    	$t->mobileno=$request->number;
    	$t->category=$request->category;
    	$t->address=$request->address;

    	$t->save();

    }
    public function showvenue()
    {
    	//return "SHOW CITY PAGE";
       $ven= Venue::all();
       return View::make('admin.showvenue',compact('ven'));

    }






}
