@extends('layouts.app')


@section('content')

@if(count($errors)>0)
<div class="row">
  <div class="col-md-6">
    <ul>
      @foreach($errors->all() as $error)
      <li>
         {{$error}}
      </li>


      @endforeach

    </ul>
    

  </div>
  


</div>
@endif


<style>
h1{
    color: #00008B;


}
table {
    border-collapse: collapse;
    
}

th, td {
    text-align: left;
    padding: 8px;
}

/* tr:nth-child(even){background-color: #f2f2f2}
 */
th {
    background-color: #00008B;
    color: #f2f2f2;
    
}
td
{
    color: #00008B ;
}
</style>
<div class="table-responsive">
    <table class="table">
<div class="panel-heading" align="center" style="background-color:#43524B;" >

<h1 align="center">

<font color="#858080">
  ADD EVENT DETAILS

</font>
</h1>


</div>
<form method="post" action="{{ url('/storeevent') }}" enctype="multipart/form-data">
	
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div id="tab"class="col-sm-12" style="background-color:#DDD6EA;">
    <table align="center">
        <tr>
            <td>
                  <label for="event_name" class="col-md-4 control-label">
                      <font color="#0C0D10">
                   Event Name

                      </font>
                 </label>
            </td>
            <td>
                 <input id="name" type="text" class="form-control" name="name" placeholder="enter the event name">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="venue" class="col-md-4 control-label">

                     <font color="#0C0D10">
                  Venue
                     </font>
                </label>
            </td>
            <td>
                 <input id="venue" type="text" class="form-control" name="venue" placeholder="enter the venue name">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="date" class="col-md-4 control-label">
                    <font color="#0C0D10">
                  Date

                       </font>

          </label>
            </td>
            <td>
                {{ Form::text('date', '', array('id' => 'datepicker')) }}

                 <!--<input id="datepicker" type="text" class="form-control" name="date" placeholder="enter the date">-->
            </td>
        </tr>
        <tr>
            <td>
                 <label for="start_time" class="col-md-4 control-label">
                    <font color="#0C0D10">

                  Start Time
                      </font>
                </label>
            </td>
            <td>
                 <input id="start_time" type="text" class="form-control" name="start_time" placeholder="enter the start-time">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="photo" class="col-md-4 control-label">
                     <font color="#0C0D10">
                  Select Image
                     </font>

                </label>
            </td>
            <td>
                 <input id="photo" type="file"  name="photo">
            </td>
            
        </tr>
             <tr>
            <td>
                 <button type="submit" class="btn btn-primary" align="center">
                    Add</button>
            </td>
            
        </tr>        

    </table>
  </div>
</form>
</table>
</div>
@endsection