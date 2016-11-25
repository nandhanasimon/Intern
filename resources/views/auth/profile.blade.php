@extends('layouts.app')

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

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #00008B;
    color: #f2f2f2;
    
}
td
{
    color: #00008B ;
}
</style>




<h1 align="center"> PROFILE</h1>
<form action="{{ url('/updateprofile') }}">
    <table align="center">
        <tr>
            <td>
<img  src="{{ url('images').'/'. $users->image}}" alt="hookah-laravel" height="100" width="100">
</td>
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
                {{ $users->phoneNo }}
            </td>
        </tr>

           <tr>
            <td>
                 <label for="image" class="col-md-4 control-label">image</label>
            </td>
            <td>
                {{ $users->image }}
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
