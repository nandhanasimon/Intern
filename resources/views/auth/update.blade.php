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
    color: #FBE8E8;


}
table {
    border-collapse: collapse;
    
}

th, td {
    text-align: left;
    padding: 8px;
}

/* tr:nth-child(even){background-color: #f2f2f2} */

th {
    background-color: #FDEDED;
    color: #f2f2f2;
    
}
td
{
    color: #FDEDED ;
}
</style>

<div class="panel-heading" align="center" style="background-color:black;" >

                   
                    <h1 align="center"> 
                    <font color="#319BED">
                        UPDATE

                    </font>
                    </h1>
                </div>



<form method="post" action="{{ url('/store') }}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    


  <div id="tab"class="col-sm-12" style="background-color:black;">
    <table align="center">
        <tr>
            <td>
                  <label for="name" class="col-md-4 control-label">


                    Name


                  </label>
            </td>
            <td>
                 <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="email" class="col-md-4 control-label">Email</label>
            </td>
            <td>
                 <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="address" class="col-md-4 control-label">Address</label>
            </td>
            <td>
                 <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="phnumber" class="col-md-4 control-label">Phone Number</label>
            </td>
            <td>
                 <input id="phnumber" type="text" class="form-control" name="phnumber" value="{{ old('phnumber') }}">
            </td>
        </tr>



        <tr>
            <td>
                 <label for="file" class="col-md-4 control-label">Select Image </label>
            </td>
            <td>
                 <input id="file" type="file"  name="file">
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

@endsection