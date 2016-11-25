@extends('layouts.app')


@section('content')



<h1 align="center">ADD EVENT DETAILS</h1>
<form method="post" action="{{ url('/storeevent') }}" enctype="multipart/form-data">
	
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table align="center">
        <tr>
            <td>
                  <label for="event_name" class="col-md-4 control-label"> Event Name</label>
            </td>
            <td>
                 <input id="name" type="text" class="form-control" name="name" placeholder="enter the event name">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="venue" class="col-md-4 control-label">Venue</label>
            </td>
            <td>
                 <input id="venue" type="text" class="form-control" name="venue" placeholder="enter the venue name">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="date" class="col-md-4 control-label">Date</label>
            </td>
            <td>
                 <input id="date" type="text" class="form-control" name="date" placeholder="enter the date">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="start_time" class="col-md-4 control-label">Start_Time</label>
            </td>
            <td>
                 <input id="start_time" type="text" class="form-control" name="start_time" placeholder="enter the start-time">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="photo" class="col-md-4 control-label">select image </label>
            </td>
            <td>
                 <input id="photo" type="file" class="form-control" name="photo">
            </td>
            
        </tr>
             <tr>
            <td>
                 <button type="submit" class="btn btn-primary" align="center">
                    Add</button>
            </td>
            
        </tr>        

    </table>
</form>

@endsection