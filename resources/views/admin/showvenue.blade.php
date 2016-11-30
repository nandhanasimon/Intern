@extends('layouts.adminapp')

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

/* tr:nth-child(even){background-color: #f2f2f2} */

th {
    background-color: #20202C;
    color: #f2f2f2;
    
}
td,a
{
    color:#f2f2f2;
}
</style>
<div class="panel-heading" align="center" style="background-color:#151414;" >

<h1 align="center">LIST OF VENUES</h1>
</div>

<div id="tab"class="col-sm-12" style="background-color:#43524B;">

   <table border="2" cellspacing ="12" align ="center" width="600">
    <tr>
        <th>VENUE NAME</th>
        <th>MOBILE NUMBER</th>
        <th>CATEGORY</th>
        <th>VENUE ADDRESS</th>
     </tr>
     <tr>
        @foreach($ven as $v)

        
        
       <td>{{ $v->vname }}</td>
       <td>{{ $v->mobileno }}</td>
       <td>{{ $v->category }}</td>
       <td>{{ $v->address }}</td>


    
       
    </tr>
    @endforeach

</table>
</div>


@endsection
