<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City;
use App\Venue;
use DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class admincontroller extends Controller
{
    //
    public function addcity()
    {
    	return view('admin.addcity');
    }

    public function storecity(Request $request)
    {
        $cit=new City;
        $name=$request->name; 
        if(City::where("city_name",$name )->first())
        {
            return redirect('addcity');
        }
        else
        {
            $cit->city_name=$request->name;
            $cit->save();
            return redirect('showcity');
        }
    }

    public function showcity()
    {
       $cit= City::all();
       return View::make('admin.showcity',compact('cit'));

    }

    public function addvenue()
    {

    $cit = City::lists('city_name','id');

    	return view('admin.addvenue',compact('cit'));
    }

    public function storevenue(Request $request)
    {
    	$t = new Venue;
        $t->vname=$request->name;
    	$t->mobileno=$request->number;
    	$t->category=$request->category;
    	$t->address=$request->address;
        $t->city_id=$request->city;

    	$t->save();
        return redirect('/showvenue');

    }
    public function showvenue()
    {
       $ven= Venue::orderBy('vname')->join('city','city.id', '=', 'venue.city_id')
                                    ->select('city.city_name', 'vname', 'mobileno', 'category', 'address','venue.id'  )->get();
       
       return View::make('admin.showvenue',compact('ven'));

    }

    public function showupdatecity($id)
    {
        $city=City::where('id',$id)->first();
        return view('admin.updatecity',compact('id','city'));
    }
    
    public function updatecity(Request $request, $id) 
    {
        $city=City::where("id",$id)->first();
        $city->city_name=$request->name;
        $city->save();
        return redirect('/');
    }

    public function deletecity($id)
    {
        City::where("id",$id)->delete();
        return redirect('/');
    }

    public function showupdatevenue($id)
    {
        $ven=Venue::where('id',$id)->first();
        $cit = City::lists('city_name','id');
        return view('admin.updatevenue',compact('id','cit','ven'));
    }
    
    public function updatevenue(Request $request, $id) 
    {
        $venue = Venue::findOrFail($id);
        $input = $request->all();
        $venue->fill($input)->save();
        return redirect('/');
    }

    public function deletevenue($id)
    {
        Venue::where("id",$id)->delete();
        return redirect('/');
    }



}
