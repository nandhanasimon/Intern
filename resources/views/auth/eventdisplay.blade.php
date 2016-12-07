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
                           
                            <img src="{{ url('images').'/'. $event->photo}}" onerror="this.src='/images/defaultevent.jpg'" style="width:290px;height:290px;"><br>
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
                                        <label for="venue" >{{ $event->vname }}</label>
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
                                   
                            </table>
                        </div>
                    </form>

                      @if(Auth::check())
                        @if($event->creator_id==Auth::User()->id)

                           
                           <a href="{{ url('/updateevent/'.$event->id) }}">
                          <button type="button" class="btn btn-primary" onclick="{{ url('/updateevent') }}" >UPDATE</button></a>
                           
                           <button type="button" class="btn btn-primary"onclick="ConfirmDelete()" >DELETE</button>
                           <script type="text/javascript">
                              function ConfirmDelete()
                              {
                                 var ans=confirm("Are you sure you want to delete?");
                                 if(ans==true)
                                 {
                                       window.location.href="{{ url('/deleteevent/'. $event->id) }}";
                                 }
                              }
                           </script>



                        @endif
                      @endif
<script type="text/javascript">
   function validate()
   {
      var NameTB = document.getElementById("guest_name");
      var namefilter= new RegExp("^[a-zA-Z\ ]+$","g");
      if(!namefilter.test(NameTB.value))
         {
            alert("PLEASE ENTER A PROPER NAME!");
            return false;
         }
         var PhoneTB = document.getElementById("phnumber");
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
   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header" style="background-color: #7F0505;">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Book Event</h4>
            </div>
         <div class="modal-body">
         <form action="{{ url('/bookevent/'.$event->id) }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  Guest Name <br> <input id="guest_name" type="text" placeholder="Name" name="guest_name" required/>
            <br> <br>
            Phone Number<br> <input id="phnumber" type="text" placeholder="Phone Number" name="phnumber" required/>
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
         <input type="submit" value="Book" onclick="return validate()" />
         </form>  
      </div>
   </div>
</div>

                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
                             

               
@endsection
