@extends('layouts.adminapp')

@section('content')
 

<style>

h1{
     color:#f2f2f2;

}
table {
    border-collapse: collapse;
    width: 30%;
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

<h1 align="center">LIST OF CITIES</h1>
</div>
<div class="table-responsive">
    <table class="table">

<div id="tab" class="col-sm-12" style="background-color:#DFE2EB;">

   <table border="2" cellspacing ="12" align ="center" width="600">
    <tr>
        <th>City Number</th>
        <th>City Name</th>
        <th>Action:Update</th>
        <th>Action:Delete</th>
       
     </tr>
     <tr>
        @foreach($cit as $c)


        <script type="text/javascript">

                            function ConfirmDelete()

                               {

                            var ans = confirm('Are you sure to Delete this Record !!');

                               if (ans == true)

                                   { 

                                     window.location.href = "{{ url('deletecity/'. $c->id)}}";

                                           }

                                 }    
                                         </script>


        <td>
            {{ $c->id }}
        </td>
        <td>
            {{ $c->city_name }}
        </td>
        <td>
           <a href="{{ url('showupdatecity/'. $c->id)}}">Change</a>
        </td>
        <td>
           <a href="#"onclick="ConfirmDelete()" >Delete</a>

        </td>

       
       
    </tr>
    @endforeach

</table>
</div>

</table>
</div>


@endsection
