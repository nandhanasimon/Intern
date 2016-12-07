\@extends('layouts.app')


@section('content')

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">

<script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>
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
	table {
		border-collapse: collapse;
	}
	th, td {
		text-align: left;
		padding: 8px;
	}
	th {
		background-color: #00008B;
		color: #f2f2f2;
	}
	td
	{
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
		
		var photoTB = document.getElementById("photo").value;
		/*var photofilter= new RegExp("^[a-zA-Z\ ]+$","g");*/
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">


<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

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
							<input id="name" type="text" class="form-control" name="name" placeholder="Enter the event name">
						</td>
					</tr>
					<tr>
						<td>
				 			<label for="city" class="col-md-4 control-label">

                               <font color="#0C0D10">
				 				City
                            </font>

				 			</label>
						</td>
						<td>
							{{ Form::select('city', $city, "0" , ["id"=>"cities", "class"=>"cities", 'placeholder' => 'select a city']) }}
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
						<td >
							<select name="venue" class="venue_options"><br>
								<option>--select a city---</option>
							</select>
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
							<input type="text" id="datepicker" name ="datepicker"class="form-control">
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
							<input id="start_time" type="time" class="form-control" name="start_time" placeholder="enter the start-time">
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
							<button type="submit" class="btn btn-primary" align="center" onclick="return validate()">
							Add</button>
						</td>
					</tr>        
				</table>
			</div>
		</form>
	</table>
</div>
<script type="text/javascript" src="{{asset('jquery.min.js')}}"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript">
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