@extends('layouts.adminapp')

@section('content')

<style>

h1{
     color:#f2f2f2;

}
table {
    border-collapse: collapse;
    width: 60%;
    background-color: #D3E2E4;
}

th, td {
    text-align: left;
    padding: 8px;
}

/* tr:nth-child(even){background-color: #f2f2f2} */

th {
    background-color: #666060;
    color: #f2f2f2;
    text-align: center;
    
}
td,a
{
    color:#0D0707;
}
</style>
<div class="panel-heading" align="center" style="background-color:#292259;" >

<h1 align="center">LIST OF VENUES</h1>
</div>

<div id="tab"class="col-sm-12" style="background-color:#DFE2EB;">

   <table border="2" cellspacing ="12" align ="center" width="600">
      <tr>
         <th>VENUE ID</th>
         <th>VENUE NAME</th>
         <th>MOBILE NUMBER</th>
         <th>CATEGORY</th>
         <th>VENUE ADDRESS</th>
         <th>VENUE CITY </th>
         <th>Action:Update</th>
         <th>Action:Delete</th>
      </tr>
      @foreach($ven as $v)

 <script type="text/javascript">

                            function ConfirmDelete()

                               {

                            var ans = confirm('Are you sure to Delete this Record !!');

                               if (ans == true || ans == 1)

                                   { 

                                     window.location.href = "{{ url('deletevenue/'. $v->id) }}";

                                           }

                                 }    
                                         </script>



      
      <tr>
         <td>{{ $v->id }}</td>
         <td>{{ $v->vname }}</td>
         <td>{{ $v->mobileno }}</td>
         <td>{{ $v->category }}</td>
         <td>{{ $v->address }}</td>
         <td>{{ $v->city_name }}</td>
         <td>
            <a href="{{ url('showupdatevenue/'. $v->id) }}">Change</a>
         </td>
         <td>
           <a href="#"onclick="ConfirmDelete()" >Delete</a>
         </td>
         
      </tr>
    @endforeach

</table>
</div>


@endsection
