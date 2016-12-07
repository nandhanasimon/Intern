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
      /*var VenueTB = document.getElementById("venue");
      var vanuefilter= new RegExp("^[a-zA-Z\ ]+$","g");
      if(!vanuefilter.test(VenueTB.value))
      {
         alert("VENUE IS NOT VALID");
         return false;
      }*/
      var photoTB = document.getElementById("photo").value;
      if(photoTB == '')
      {
         /*alert("PLEASE SELECT A FILE");
         return false;*/
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
        var e = document.getElementById("cities");
var strUser = e.options[e.selectedIndex].value;

var strUser1 = e.options[e.selectedIndex].text;
if(strUser==0)
{
alert("Please select a city");
return false;
}
       

}
</script>



<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<h1 align="center">UPDATE EVENT DETAILS</h1>
<form method="post" action="{{ url('/storeupdateevent/'.$e->id) }}" enctype="multipart/form-data">
  
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table align="center">
   <tr>
      <td>
         <label for="event_name" class="col-md-4 control-label">Event Name</label>
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
         {{ Form::select('city', $city, $e->city_id, ["id"=>"cities", "class"=>"cities", 'placeholder' => 'select a city']) }}
      </td>
   </tr>
   <tr>
      <td>
         <label for="venue" class="col-md-4 control-label">Venue</label>
      </td>
      <td>
         <select name="venue" class="venue_options"><br>
            <option>--Select a venue---</option>
         </select>
      </td>
   </tr>
   <tr>
      <td>
         <label for="date" class="col-md-4 control-label">Date</label>



      </td>
      <td>
         <input type="text" id="datepicker" name ="datepicker" class="form-control" value="{{ $e->date }}" required>
         <script>
$(document).ready(function() {
$("#datepicker").datepicker({


   minDate:+1
   //maxDate:+60
/*numberOfMonths: 3,*/
//showButtonPanel: true

});
});
</script>
      
      </td>
   </tr>
   <tr>
      <td>
         <label for="start_time" class="col-md-4 control-label">Start Time</label>
      </td>
      <td>
         <input id="start_time" type="time" class="form-control" name="start_time" value="{{ $e->start_time }}">
      </td>
   </tr>
   <tr>
      <td>
         <label for="photo" class="col-md-4 control-label">Select Image</label>
      </td>
      <td>
         <input id="photo" type="file"  name="photo">

         <script type="text/javascript">
            function readURL(input) {
                  if (input.files && input.files[0]) {
                     var reader = new FileReader();
                     reader.onload = function (e) {
                        $('#disp_img').attr('src', e.target.result);
                     }
                     reader.readAsDataURL(input.files[0]);
                  }
            }
            $("#photo").change(function(){
               readURL(this);
            });
         </script>

      </td>
      <td>
         <img id="disp_img"  src="{{ url('images').'/'.$e->photo }}" height="150" width="150">
      </td>
   </tr>
   <tr>
      <td>
         <button type="submit" class="btn btn-primary" align="center" onclick="return validate()">UPDATE</button>
      </td>
   </tr>        
</table>
</form>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
if($(".cities").val()!=0)
{
   //alert("VENUE UPDATE")
   $.ajax({
            method: 'GET', 
            url: '/venue-list/' + $(".cities").val(), 
            success: function(response){ 
               $(".venue_options").empty()
               $.each(response, function(i, obj){
                  console.log(obj)
                  $(".venue_options").append("<option value="+obj.id+">"+obj.vname+"</option>")
               })
            },
            error: function(jqXHR, textStatus, errorThrown) { 
               console.log(JSON.stringify(jqXHR));
               console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
         });
         if($(".cities").val()=="")
         {
            $(".venue_options").empty()
            //$(".venue_options").append("<option value="">"--Select a venue--"</option>")
         }
}
      $(".cities").change(function(){
         $.ajax({
            method: 'GET', 
            url: '/venue-list/' + $(this).val(), 
            success: function(response){ 
               $(".venue_options").empty()
               $.each(response, function(i, obj){
                  console.log(obj)
                  $(".venue_options").append("<option value="+obj.id+">"+obj.vname+"</option>")
               })
            },
            error: function(jqXHR, textStatus, errorThrown) { 
               console.log(JSON.stringify(jqXHR));
               console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
         });

         if($(".cities").val()=="")
         {
            $(".venue_options").empty()
            //$(".venue_options").append("<option value="">"--Select a venue--"</option>")
         }
      });

</script>

@endsection