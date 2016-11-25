@extends('layouts.app')


@section('content')



<h1 align="center">UPDATING</h1>
<form method="post" action="{{ url('/store') }}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table align="center">
        <tr>
            <td>
                  <label for="name" class="col-md-4 control-label">Name</label>
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
                 <label for="phnumber" class="col-md-4 control-label">phoneNo</label>
            </td>
            <td>
                 <input id="phnumber" type="text" class="form-control" name="phnumber" value="{{ old('phnumber') }}">
            </td>
        </tr>



        <tr>
            <td>
                 <label for="file" class="col-md-4 control-label">select image </label>
            </td>
            <td>
                 <input id="file" type="file" class="form-control" name="file">
            </td>
            
        </tr>

             <tr>
            <td>
                 <button type="submit" class="btn btn-primary" align="center">
                    Add</button>
            </td>
            
        </tr>        

    </table>
</form>

@endsection