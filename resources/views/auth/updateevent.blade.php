@extends('layouts.app')


@section('content')

@if(count($errors)>0)
   <div class="row">
      <div class="col-md-6">
         <ul>
            @foreach($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach
         </ul>
      </div>
   </div>
@endif
<style>
   h1{
         color: #00008B;
   }
   table{
      border-collapse: collapse;
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

   td{
      color: #00008B ;
   }
</style>


<script type="text/javascript">
   function validate()
   {
      var NameTB = document.getElementById("name");
      var namefilter= new RegExp("^[a-zA-Z\ ]+$","g");
      if(!namefilter.test(NameTB.value))
      {
         alert("EVENT NAME IS NOT VALID");
         return false;
      }
      var VenueTB = document.getElementById("venue");
      var vanuefilter= new RegExp("^[a-zA-Z\ ]+$","g");
      if(!vanuefilter.test(VenueTB.value))
      {
         alert("VENUE IS NOT VALID");
         return false;
      }
      var photoTB = document.getElementById("photo").value;
      if(photoTB == '')
      {
         alert("PLEASE SELECT A FILE");
         return false;
      }
      else
      {
         var extension = photoTB.substring(photoTB.lastIndexOf('.') +1).toLowerCase();
         if(extension == "jpg" || extension == "png" || extension == "gif")
         {
         }
         else
         {
            alert("INVALID FILE FORMAT");
            document.getElementById("photo").value = '';
            return false;
         }
      }
   }
</script>

<h1 align="center">UPDATE EVENT DETAILS</h1>
<form method="post" action="{{ url('/storeupdateevent/'.$e->id) }}" enctype="multipart/form-data">
  
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table align="center">
   <tr>
      <td>
         <label for="event_name" class="col-md-4 control-label"> Event Name</label>
      </td>
      <td>
         <input id="name" type="text" class="form-control" name="name" value="{{ $e->event_name }}">
      </td>
   </tr>
   <tr>
      <td>
         <label for="city" class="col-md-4 control-label">City</label>
      </td>
      <td>
         <!--<input id="venue" type="text" class="form-control" name="venue" value="{{ $e->venue }}">-->
         {{ Form::select('city', $city , Input::old('city')) }}
      </td>
   </tr>
   <tr>
      <td>
         <label for="venue" class="col-md-4 control-label">Venue</label>
      </td>
      <td>
         <!--<input id="venue" type="text" class="form-control" name="venue" value="{{ $e->venue }}">-->
         {{ Form::select('venue', $ven , Input::old('vname')) }}
      </td>
   </tr>
   <tr>
      <td>
         <label for="date" class="col-md-4 control-label">Date</label>
      </td>
      <td>
         <input id="date" type="date" class="form-control" name="date" placeholder="Date">
               <!--  {{ Form::text('date', "", array('id' => 'datepicker')) }} -->

                 <!--{{ $e->date }}
                 <input id="datepicker" type="text" class="form-control" name="date" placeholder="enter the date">-->
      </td>
   </tr>
   <tr>
      <td>
         <label for="start_time" class="col-md-4 control-label">Start Time</label>
      </td>
      <td>
         <input id="start_time" type="text" class="form-control" name="start_time" value="{{ $e->start_time }}">
      </td>
   </tr>
   <tr>
      <td>
         <label for="photo" class="col-md-4 control-label">Select Image</label>
      </td>
      <td>
         <input id="photo" type="file"  name="photo">
      </td>
   </tr>
   <tr>
      <td>
         <button type="submit" class="btn btn-primary" align="center" onclick="return validate()">
                    Add</button>
      </td>
   </tr>        
</table>
</form>

@endsection