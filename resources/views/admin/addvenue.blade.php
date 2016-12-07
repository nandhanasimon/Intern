@extends('layouts.adminapp')


@section('content')

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

<script type="text/javascript">
  function validate()
    {
      var NameTB = document.getElementById("name");

      var namefilter= new RegExp("^[a-zA-Z\ ]+$","g");
      if(!namefilter.test(NameTB.value))
        {
          alert("Enter a proper name");
          return false;
        }

 var PhoneTB = document.getElementById("number");

      var phonefilter = new RegExp("[0-9]{10}$");

      if(!phonefilter.test(PhoneTB.value))
        {
          alert("Not a Phone Number!");
          PhoneTB.focus();
          return false;
        }


         var CatTB = document.getElementById("category");

      var catfilter= new RegExp("^[a-zA-Z\ ]+$","g");
      if(!catfilter.test(CatTB.value))
        {
          alert("Enter a Proper Venue Category");
          return false;
        }


      }
</script>

<div class="panel-heading" align="center" style="background-color:#43524B;" >

<h1 align="center">

<font color="#858080">
  ADD VENUE 

</font>
</h1>


</div>
<form method="post" action="{{ url('/storevenue') }}" enctype="multipart/form-data">
	
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div id="tab"class="col-sm-12" style="background-color:#DDD6EA;">
    <table align="center">
        <tr>
            <td>
                  <label for="venue_name" class="col-md-4 control-label">
                      <font color="#0C0D10">
                    Venue Name

                      </font>
                 </label>
            </td>
            <td>
                 <input id="venue_name" type="text" class="form-control" name="name" placeholder="enter the venue name">
            </td>
        </tr>


        <tr>
            <td>
                  <label for="mobile number" class="col-md-4 control-label">
                      <font color="#0C0D10">
                    Phone Number

                      </font>
                 </label>
            </td>
            <td>
                 <input id="number" type="text" class="form-control" name="number" placeholder="enter the Phone Number">
            </td>
        </tr>

        <tr>
            <td>
                  <label for="category" class="col-md-4 control-label">
                      <font color="#0C0D10">
                    Venue Category

                      </font>
                 </label>
            </td>
            <td>
                 <input id="category" type="text" class="form-control" name="category" placeholder="enter the Category">
            </td>
        </tr>
        <tr>
            <td>
                  <label for="address" class="col-md-4 control-label">
                      <font color="#0C0D10">
                    Venue Address

                      </font>
                 </label>
            </td>
            <td>
                 <input id="address" type="text" class="form-control" name="address" placeholder="enter the venue address">
            </td>
        </tr>



        <tr>
            <td>
                  <label for="address" class="col-md-4 control-label">
                      <font color="#0C0D10">
                    Venue City

                      </font>
                 </label>
            </td>
                    <td>

              {{ Form::select('city', $cit , Input::old('city_name')) }}
                      
                  

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

@endsection