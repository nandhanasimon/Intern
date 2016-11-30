<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use App\User;
//use App\Model;
use App\Guest;
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

    public function bookevent(BookEventRequest $request , $id)
    {
   
    $guests = new Guest;    //Guest is the Model name

    //$guests->success="false";

        //dd($request->all());
        echo "<br><br>";
        echo "<pre>";
        $guests->guest_name = $request->name;
        $guests->phnumber = $request->number;
        $guests->event_id = $id;
        $guests->no_of_couples=$request->no_of_couples;   //will be passing the names of input feilds
        $guests->save();
        return redirect('listevent');



    }

    public function eventdisplay($sid)
    {
        //return "hai";
        //$u=Auth::User()->id;
        //dd($u);
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

    public function store(UpdateRequest $request)
    {

//
        $users = User::where("id", Auth::user()->id)->first();
        //dd($users->all());
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




public function storeevent(StoreEventRequest $request)
{

    


    //$event = events::where("id", Auth::events()->id)->first();
        $event = new events;

        echo "<br><br>";
        echo "<pre>";
        $event->event_name = $request->name;
        $event->venue = $request->venue;
        $event->date = Carbon::createFromFormat('d/m/Y', $request->date)->toDateString();
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
        //dd($e);
        return view('auth.updateevent',compact('e'));

    }
    public function storeupdateevent(Request $request,$id)
    {

        $event=Events::where("id",$id)->first();

        $event->event_name=$request->name;
        $event->venue=$request->venue;
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
