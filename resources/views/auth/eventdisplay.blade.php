@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">EVENT</div>

                <div class="panel-body">
                    <form action="{{ url('/bookevent') }}" >
    
                        <div style="width:293px;height:390px;margin-right: 10px;float: left;">
                            
                            <img src="{{ url('images').'/'. $event->photo}}" alt="Mountain View" style="width:290px;height:290px;"><br>
                        </div>
                        <div>                   
                                <table>
                                 <tr>
                                    <td>
                                        <label for="name" class="col-md-4 control-label">Name:</label>
                                    </td>
                                    <td>
                                        <label for="name" >{{ $event->event_name }}</label>
                                     <!--class="col-md-4 control-label"-->
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <label for="venue" class="col-md-4 control-label">Venue</label>
                                    </td>
                                    <td>
                                        <label for="venue" >{{ $event->venue }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="time" class="col-md-4 control-label">Time</label>
                                    </td>
                                    <td>
                                        <label for="time" >{{ $event->start_time }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="date" class="col-md-4 control-label">date</label>
                                    </td>
                                    <td>
                                        <label for="date" >{{ $event->date }}</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-primary" align="center">book</button>
                                    </td>    
                                </tr>        
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                       

                
@endsection
