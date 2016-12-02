<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Venue;
use App\Guest;
use App\City;
use Illuminate\Support\Facades\View;
use App\Events;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\BookEventRequest;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $event= Events::all();
        return view('welcome',compact('event')); 
    }

    public function homepage()
    {
        $event= Events::all();
        $cit= City::all();
        return view('homepage',compact('event','cit'));
    }

    public function bookevent(BookEventRequest $request , $id)
    {
   
        $guests = new Guest;    //Guest is the Model name
        $guests->guest_name = $request->name;
        $guests->phnumber = $request->number;
        $guests->event_id = $id;
        $guests->no_of_couples=$request->no_of_couples;   //will be passing the names of input feilds
        $guests->save();
        return redirect('listevent');
    }

    public function eventdisplay($sid)
    {
        $event=Events::where("id",$sid)->first();
        return view('auth.eventdisplay',compact('event'));
    }

    public function profile()
    {
        $users=Auth::user();
        return view('auth.profile',compact('users'));
    }
    
    public function update()
    {
        $user=Auth::User();
        return view('auth.update',compact('user'));
    }

    public function store(UpdateRequest $request)
    {

        $users = User::where("id", Auth::user()->id)->first();
        $filepath=public_path('/images/');

        $file=$request->file;
        if($request->hasfile('file'))
        { 
            $name = time(). '-' .$file->getClientOriginalName();
            $users->image = $name;
            $file->move($filepath, $name);
        }
        else
        {
            return "File does not exist";
        }

        $users->name = $request->name;
        $users->email = $request->email;
        $users->address = $request->address;
        $users->phnumber = $request->phnumber;
        $users->save();
        $users=Auth::user();
        return redirect('profile');
    }

    public function addevent()
    {
        $ven = Venue::lists('vname','id');
        $city=City::lists('city_name','id');
        return view('auth.addevent',compact('city','ven'));
    }


    public function listevent()
    {
        $event= Events::all();
        return View::make('auth.listevent',compact('event'));

    }

    public function storeevent(StoreEventRequest $request)
    {
        
        $cc=City::findOrFail($request->city);
        $vv=Venue::findOrFail($request->venue);
        
        $event = new events;

        


        
        
        $event->event_name = $request->name;

        $event->venue = $vv->vname;

        $event->city_name= $cc->city_name;

        $event->date = $request->date;
        
        $event->start_time = $request->start_time;

        $filepath=public_path('/images/');

        $file=$request->photo;
        if($request->hasfile('photo'))
        { 
            $name = time(). '-' .$file->getClientOriginalName();
            $event->photo = $name;
            $file->move($filepath, $name);
        }
        else
        {
            return "File does not exist";
        }

        $event->creator_id=Auth::user()->id;
        $event->save();
        return redirect('listevent');

    }

    public function test(){
        return "test";
    }

    public function updateevent($id)
    {
        $e=Events::where("id",$id)->first();
        $ven = Venue::lists('vname','id');
        $city=City::lists('city_name','id');
        return view('auth.updateevent',compact('e','ven','city'));

    }
    public function storeupdateevent(Request $request,$id)
    {

        $event=Events::where("id",$id)->first();

        $cc=City::findOrFail($request->city);
        $vv=Venue::findOrFail($request->venue);


        $event->event_name=$request->name;

        $event->venue=$vv->venue;

        $event->city_name=$cc->city;


        $event->date=$request->date;

        $event->start_time=$request->start_time;

        $filepath=public_path('/images/');
        $file=$request->photo;
        if($request->hasfile('photo'))
        { 
            $name = time(). '-' .$file->getClientOriginalName();
            $event->photo = $name;
            $file->move($filepath, $name);
        }
        else
        {
            return "File does not exist";
        }
        $event->creator_id=Auth::user()->id;
        $event->save();

        return redirect('/home'); 

    }

    public function deleteevent($id)
    {
        $event=Events::where("id", $id)->delete();
        return redirect('/listevent');
    }
}
