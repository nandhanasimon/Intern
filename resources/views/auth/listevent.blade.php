@extends('layouts.app')

@section('content')

<style>
table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #00008B;
    color: #f2f2f2;
    
}
td
{
    color: #00008B ;
}
</style>

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
