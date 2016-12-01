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

        echo "<br><br>";
        echo "<pre>";
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
    	//return "SHOW CITY PAGE";
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
        //dd($request->all());
        //$id= City::where('city_name',$request->city)->pluck('id');
        //dd($id);;
        //$t->city_id=$id;
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
    	//return "SHOW CITY PAGE";
       $ven= Venue::orderBy('vname')->join('city','city.id', '=', 'venue.city_id')
                                    ->select('city.city_name', 'vname', 'mobileno', 'category', 'address'  )->get();
       //dd($ven);
      // $cit=City::where("id",$ven->city_id)->get();
       return View::make('admin.showvenue',compact('ven'));

    }






}
