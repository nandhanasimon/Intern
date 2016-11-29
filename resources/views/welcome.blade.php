@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">All EVENTS</div>

                <div class="panel-body">
                    <!--Your Application's Landing Page.<br>-->

                   
                    @foreach($event as $e)
                        <div style="width:293px;height:390px;margin-right: 10px;float: left;"class="col-sm-4" style="background-color:lavender;">
                            <a href="{{ '/eventdisplay/'.$e->id }}  ">
                            <img src="{{ url('images').'/'. $e->photo}}" alt="Mountain View" style="width:290px;height:290px;"><br>
                            </a>
                            <table>
                            <tr>
                                <td>
                                    <label for="name" class="col-md-4 control-label">Name:</label>
                                </td>
                                <td>
                                    <label for="name" >{{ $e->event_name }}</label>
                                    <!--class="col-md-4 control-label"-->
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <label for="venue" class="col-md-4 control-label">Venue</label>
                                </td>
                                <td>
                                    <label for="venue" >{{ $e->venue }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="time" class="col-md-4 control-label">Time</label>
                                </td>
                                <td>
                                    <label for="time" >{{ $e->start_time }}</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="date" class="col-md-4 control-label">date</label>
                                </td>
                                <td>
                                    <label for="date" >{{ $e->date }}</label>
                                </td>
                            </tr>
                            </table>

                        </div>
                       

                    @endforeach
                   
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection