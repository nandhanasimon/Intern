@extends('layouts.app')

@section('content')

<h1 align="center">HELLO UPDATE</h1>
<form action="{{ url('/updateprofile') }}">
    <table align="center">
        <tr>
            <td>
                  <label for="name" class="col-md-4 control-label">Name</label>
            </td>
            <td>
                {{ $users->name }}
            </td>
        </tr>
        <tr>
            <td>
                 <label for="email" class="col-md-4 control-label">Email</label>
            </td>
            <td>
                {{ $users->email }}
            </td>
        </tr>
        <tr>
            <td>
                 <label for="address" class="col-md-4 control-label">Address</label>
            </td>
            <td>
                {{ $users->address }}
            </td>
        </tr>
        <tr>
            <td>
                 <label for="phoneNo" class="col-md-4 control-label">phoneNo</label>
            </td>
            <td>
                {{ $users->phnumber }}
            </td>
        </tr>


        <tr>
            <td>
                 <label for="image" class="col-md-4 control-label">image</label>
            </td>
            <td>
                <img  src="{{ url('images').'/'. $users->image}}" alt="Smiley face" height="100" width="100">
            </td>
        </tr>


             <tr>
            <td>
                 <button type="submit" class="btn btn-primary" align="center">
                    UPDATE</button>
            </td>
            
        </tr>        

    </table>
</form>
@endsection
