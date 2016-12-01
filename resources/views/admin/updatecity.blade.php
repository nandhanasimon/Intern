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
          alert("Not a valid City!");
          return false;
        }
      }
</script>


<div class="panel-heading" align="center" style="background-color:#292259;" >

   <h1 align="center">

      <font color="#858080">
         ADD CITY 
      </font>
   </h1>
</div>

<form method="post" action="{{ url('updatecity/'. $id) }}" enctype="multipart/form-data">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div id="tab"class="col-sm-12" style="background-color:#DDD6EA;">
         <table align="center">
            <tr>
               <td>
                  <label for="city_name" class="col-md-4 control-label">
                      <font color="#0C0D10">City Name</font>
                  </label>
               </td>
               <td>
                  <input id="name" type="text" class="form-control" name="name" value=" {{ $city->city_name }} ">
               </td>
            </tr>
            <tr>
               <td>
                  <button type="submit" class="btn btn-primary" align="center" onclick="return validate()">
                    Update</button>
               </td>
            </tr>        
         </table>
      </div>
</form>

@endsection