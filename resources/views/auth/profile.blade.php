@extends('layouts.app')

@section('content')

<style>
h1{
    color: #150404;


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
    color: #FDEDED;
    
}
td
{
    color: #FDEDED;
}

/* #tab{
margin: 10;
    text-align: center;
    width: 800px;

} */

</style>


<div class="panel-heading" align="center" style="background-color:#43524B;" >

                   
                    <h1 align="center"> 
                    <font color="#858080">
                        PROFILE

                    </font>
                    </h1>
                </div>



<form action="{{ url('/updateprofile') }}">


<div id="tab"class="col-sm-12" style="background-color:#DDD6EA;">

    <div class="table-responsive">
    <table class="table">

    
    <table align="center">
        <tr>
            <td>
<img  src="{{ url('images').'/'. $users->image}}" class="img-circle" alt="hookah-laravel" height="100" width="100">
</td>
        <tr>
            <td>
                  <label for="name" class="col-md-4 control-label">
              <font color="#0C0D10">

                    Name

</font>
                </label>
            </td>
            <td>
                <font color="#0C0D10">
                {{ $users->name }}

            </font>
            </td>
        </tr>
        <tr>
            <td>
                 <label for="email" class="col-md-4 control-label">

                <font color="#0C0D10">
                    Email

                </font>
                </label>
            </td>
            <td>
                <font color="#0C0D10">
                {{ $users->email }}
            </font>
            </td>
        </tr>
        <tr>
            <td>
                 <label for="address" class="col-md-4 control-label">

                 <font color="#0C0D10">
                    Address
                 </font>
                </label>
            </td>
            <td>
                <font color="#0C0D10">
                {{ $users->address }}
            </font>
            </td>
        </tr>
        <tr>
            <td>
                 <label for="phoneNo" class="col-md-4 control-label">
                <font color="#0C0D10">
              
                    phone Number
</font>
                </label>
            </td>
            <td>
                <font color="#0C0D10">
                {{ $users->phnumber }}
            </font>
            </td>
        </tr>


          <tr>
            <td>
                 <button type="submit" class="btn btn-primary" align="center">
                    UPDATE</button>
            </td>
            
        </tr>        

    </table>

</table>
</div>
</div>

</form>


 

@endsection
