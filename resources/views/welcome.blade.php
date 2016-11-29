@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="background-color:black;" >

                   <font color="#319BED">
                    All EVENTS

                    </font>
                </div>

                <div class="panel-body">
                    <!--Your Application's Landing Page.<br>-->

                   
                    @foreach($event as $e)
                        <div class="col-sm-4" style="background-color:black;">
                            <a href="{{ '/eventdisplay/'.$e->id }}  ">
                            <img src="{{ url('images').'/'. $e->photo}}" alt="Mountain View" style="width:290px;height:290px;"><br>
                            </a>
                            <table>
                            <tr>
                                <td>
                                    <label for="name" class="col-md-4 control-label">

                                   <font color="white">
                                        Name:</label>
                                    </font>
                                </td>
                                <td>
                                    <label for="name" >
                                     <font color="white">
                                        {{ $e->event_name }}</label>
                                    </font>
                                    <!--class="col-md-4 control-label"-->
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <label for="venue" class="col-md-4 control-label">
                                   <font color="white">
                                        Venue:
                                    </font>

                                    </label>
                                </td>
                                <td>
                                    <label for="venue" >
                                  <font color="white">

                                        {{ $e->venue }}
                                   </font>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="time" class="col-md-4 control-label">

                                     <font color="white">
                                        Time: 
                                    </font>
                                    </label>
                                </td>
                                <td>
                                    <label for="time" >
                                    <font color="white">
                                        {{ $e->start_time }}
                                    </font>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="date" class="col-md-4 control-label">

                                      <font color="white">
                                        Date:
                                       </font>

                                    </label>
                                </td>
                                <td>
                                    <label for="date" >
                                     <font color="white">
                                        {{ $e->date }}
                                     </font>
                                    </label>
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