@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center" style="background-color:#43524B;" >

                   <font color="#B1B3B6">
                    All EVENTS

                    </font>
                </div>

                <div class="panel-body">
                    <!--Your Application's Landing Page.<br>-->

                     <div class="thumbnail">

                   
                    @foreach($event as $e)
                   
                        <div class="col-sm-4" style="background-color:#DDD6EA;"align="center">
                            <a href="{{ '/eventdisplay/'.$e->id }}  ">
                            <img class="img-responsive" src="{{ url('images').'/'. $e->photo}}" alt="Mountain View" style="width:290px;height:290px;"><br>
                            </a>
                            <table  cellpadding="10">
                                <div class="caption">
                            <tr>
                                <td>
                                     
                                    <label for="name" class="col-md-4 control-label">

                                   <font color="#201B1B">
                                        Name:
                                    </font>
                                    </label>

                                </td>
                                <td>
                                    <label for="name" >
                                     <font color="#1D1818">
                                        {{ $e->event_name }}</label>
                                    </font>
                                    <!--class="col-md-4 control-label"-->
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <label for="venue" class="col-md-4 control-label">
                                   <font color="#1D1818">
                                        Venue:
                                    </font>

                                    </label>
                                </td>
                                <td>
                                    <label for="venue" >
                                  <font color="#1D1818">

                                        {{ $e->venue }}
                                   </font>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="time" class="col-md-4 control-label">

                                     <font color="#1D1818">
                                        Time: 
                                    </font>
                                    </label>
                                </td>
                                <td>
                                    <label for="time" >
                                    <font color="#1D1818">
                                        {{ $e->start_time }}
                                    </font>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="date" class="col-md-4 control-label">

                                      <font color="#1D1818">
                                        Date:
                                       </font>

                                    </label>
                                </td>
                                <td>
                                    <label for="date" >
                                     <font color="#1D1818">
                                        {{ $e->date }}
                                     </font>
                                    </label>
                                </td>
                            </tr>
                        </div>
                            </table>

                        </div>

                       

                    @endforeach
                   
                   </div>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection