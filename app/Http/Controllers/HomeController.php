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
    
        //$event= Events::all();

        $event= Events::orderBy('event_name')->join('city','city.id', '=', 'events.city_id')
                                    ->join('venue','venue.id', '=' , 'events.venue_id')
        ->select('photo','city.city_name', 'venue.vname','creator_id', 'event_name', 'date', 'start_time','events.id' )
        ->get();

        return view('welcome',compact('event')); 
    }

    public function homepage()
    {
        $event= Events::orderBy('event_name')->join('city','city.id', '=', 'events.city_id')
        ->join('venue','venue.id', '=' , 'events.venue_id')
        ->select('photo','city.city_name', 'venue.vname','creator_id', 'event_name', 'date', 'start_time','events.id' )
        ->get();

        $cities=City::all();
        return view('homepage',compact('event','cities'));
    }

    public function bookevent(BookEventRequest $request , $id)
    {
        $guest = $request->all();
        $guest['event_id'] = $id;
        Guest::create($guest);

        return redirect('eventdisplay/'.$id);
    }

    public function eventdisplay($sid)
    {
        $event= Events::orderBy('event_name')->join('city','city.id', '=', 'events.city_id')
            ->join('venue','venue.id', '=' , 'events.venue_id')
            ->select('photo','city.city_name', 'venue.vname','creator_id', 'event_name', 'date', 'start_time','events.id' )
            ->where('events.id', $sid)
            ->first();

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
        //$user=$request->all();
        $filepath=public_path('/images/');

        $file=$request->image;
        if($request->hasfile('image'))
        { 
            $name = time(). '-' .$file->getClientOriginalName();
            $user->image = $name;
            $file->move($filepath, $name);
        }
        /*//$user['id']=Auth::User()->id;
        dd($user);
        User::where('id',Auth::User()->id)->update($user);*/
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


        $event= Events::orderBy('event_name')->join('city','city.id', '=', 'events.city_id')
                                    ->join('venue','venue.id', '=' , 'events.venue_id')
                                    ->select('city.city_name', 'venue.vname', 'event_name', 'date', 'start_time','events.id' )
                                    ->where('creator_id',Auth::User()->id)
                                    ->get();
        return View::make('auth.listevent',compact('event'));

    }

    public function storeevent(StoreEventRequest $request)
    {
        
       
        $event = new Events;
        $event->event_name = $request->name;
        $event->venue_id = $request->venue;
        $event->city_id= $request->city;
        $event->date = $request->datepicker;
        $event->start_time = $request->start_time;
        $filepath=public_path('/images/');
        $file=$request->photo;
        if($request->hasfile('photo'))
        { 
            $name = time(). '-' .$file->getClientOriginalName();
            $event->photo = $name;
            $file->move($filepath, $name);
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
        $city=City::lists('city_name','id');
        return view('auth.updateevent',compact('e','city'));
    }
    public function storeupdateevent(Request $request,$id)
    {

        //dd($request->all());
        $event=Events::where("id",$id)->first();
        $event->event_name=$request->name;
        $event->venue_id=$request->venue;
        $event->city_id=$request->city;
        $event->date=$request->datepicker;
        $event->start_time=$request->start_time;

        $filepath=public_path('/images/');
        $file=$request->photo;
        if($request->hasfile('photo'))
        { 
            $name = time(). '-' .$file->getClientOriginalName();
            $event->photo = $name;
            $file->move($filepath, $name);
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

    public function getVenues($city){
        $venues = Venue::where('city_id', $city)->get();
        return $venues;
    }

    public function test1(){
        $cities = City::lists("city_name", "id");
        return view("test", compact('cities'));
    }
}
