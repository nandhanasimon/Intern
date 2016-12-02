@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">EVENT</div>

                    <div class="panel-body">
                       <form action="#" >
   
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
                                        <label for="city" class="col-md-4 control-label">City</label>
                                    </td>
                                    <td>
                                        <label for="city" >{{ $event->city_name }}</label>
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
                                <!-- <tr>
                                            <td>
                                                <button type="submit" class="btn btn-primary" align="center">book</button>
                                            </td>   
                                        </tr> -->       
                            </table>
                        </div>
                    </form>
                          <!-- Trigger the modal with a button -->
                      @if(Auth::check())
                        @if($event->creator_id==Auth::User()->id)

                           
                           <a href="{{ url('/updateevent/'.$event->id) }}"><button type="button" class="btn btn-primary" onclick="{{ url('/updateevent') }}" >UPDATE</button></a>
                          <!--  <a href="{{ url('/deleteevent/'.$event->id) }}"> 
                          
                           -->
                            <button type="button" class="btn btn-primary"onclick="ConfirmDelete()" >DELETE</button>
<!--                             </a> 
 -->
                          <script type="text/javascript">

                            function ConfirmDelete()

                               {

                            var ans = confirm('Are you sure to Delete this Record !!');

                               if (ans == true || ans == 1)

                                   { 

                                     window.location.href = "{{ url('/deleteevent/'.$event->id) }}";

                                           }

                                 }    
                                         </script>
                        


                
                        @endif
                      @endif



        <script type="text/javascript">
  function validate()
    {
      var NameTB = document.getElementById("name");

      var namefilter= new RegExp("^[a-zA-Z\ ]+$","g");
      if(!namefilter.test(NameTB.value))
        {
          alert("PLEASE ENTER A PROPER NAME!");
          return false;
        }

        var PhoneTB = document.getElementById("number");

      var phonefilter = new RegExp("[0-9]{10}$");

      if(!phonefilter.test(PhoneTB.value))
        {
          alert("NOT A PHONE NUMBER!");
          PhoneTB.focus();
          return false;
        }

            
            }   
            </script>       
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" >BOOK</button>
                      

                      <!-- Modal -->
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                       
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: #7F0505;">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Book Event</h4>
                            </div>
                            <div class="modal-body">

                          

                          
                              <form action="{{ url('/bookevent/'.$event->id) }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  Guest Name <br> <input id="name" type="text" placeholder="Name" name="name" required/>
                                  <br> <br>
                                  phone Number<br> <input id="number" type="text" placeholder="phone number" name="number" required/>
                                  <br> <br>
                                  
                                  Total no. of couples
                                  <select name="no_of_couples" id="noc">
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                      <option value="3">3</option>
                                      <option value="4">4</option>
                                      <option value="5">5</option>
                                  </select>
                                  <br/> <br>
                                  <input type="submit" name="book" value="Book" onclick="return validate()" />
                              </form>  
                            </div>
                            <!-- <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div> -->
                          </div>
                         
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
               </script>              

               
@endsection
