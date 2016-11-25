@extends('layouts.app')

@section('content')

<h1 align="center">LIST OF EVENTS</h1>

<table border="5" cellspacing ="12" align ="center" width="600">
    <tr>
        <td>Event Name</td>
        <td>Event Venue</td>
        <td>Date</td>
        <td>Start Time</td>
     </tr>
     <tr>
        @foreach($event as $evee)

        
        
       <td><a href="{{ '/eventdisplay/'.$evee->id }}  ">{{ $evee->event_name }}</a></td>
        <td>{{ $evee->venue }}</td>
        <td>{{ $evee->date }}</td>
        <td>{{ $evee->start_time }}</td>
    </tr>
    @endforeach

</table>


@endsection
