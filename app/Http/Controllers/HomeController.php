<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Support\Facades\View;
use App\Events;
use App\Http\Requests;
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



    public function eventdisplay($sid)
    {
        //return "hai";

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
        return view('auth.update');
    }

    public function store(Request $request)
    {
        $users = User::where("id", Auth::user()->id)->first();
        //echo "<pre>";
        //var_dump($users);
        echo "<br><br>";

        echo "<pre>";
        

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
        return view('auth.addevent');
    }


    public function listevent()
    {
        $event= Events::all();
        return View::make('auth.listevent',compact('event'));

    }




public function storeevent(Request $request)
{

    //$event = events::where("id", Auth::events()->id)->first();
$event = new events;

        echo "<br><br>";
        echo "<pre>";
        $event->event_name = $request->name;
        $event->venue = $request->venue;
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

        $event->save();
        //$events=Auth::events();
        return redirect('listevent');

}

    public function test(){
        return "test";
    }






}
