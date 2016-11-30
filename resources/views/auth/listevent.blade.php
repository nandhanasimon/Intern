@extends('layouts.app')

@section('content')

<style>

/* h1{
    background-color: #D2D2DB;


} */
table {
    border-collapse: collapse;
    width: 80%;
}

th, td {
    text-align: left;
    padding: 8px;
}

/* tr:nth-child(even){background-color: #f2f2f2} */

th {
    background-color: #20202C;
    color: #f2f2f2;
    
}
td,a
{
    color:#0B0B12;
}
</style>
<div class="panel-heading" align="center" style="background-color:#151414;" >

<h1 align="center">

    <font color="#D2C8C8"> LIST OF EVENTS
</font>

    </h1>
</div>

<div class="table-responsive">
    <table class="table">


<div id="tab"class="col-sm-12" style="background-color:#43524B;">

   <table border="2" cellspacing ="12" align ="center" width="600">
    <tr>
        <th>Event Name</th>
        <th>Event Venue</th>
        <th>Date</th>
        <th>Start Time</th>
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
</div>
</div>
</table>


@endsection
