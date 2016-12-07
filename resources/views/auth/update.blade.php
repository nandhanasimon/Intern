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
    color: #858080;


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
    background-color: #252530;
    color: #f2f2f2;
    
}
td
{
    color: #0C0B1D ;
}
</style>
<script type="text/javascript">
  function validate()
    {
      var NameTB = document.getElementById("name");

      var namefilter= new RegExp("^[a-zA-Z\ ]+$","g");
      if(!namefilter.test(NameTB.value))
        {
          alert("Please enter only characters");
          return false;
        }

      var EmailTB = document.getElementById("email");

      var emailfilter = new RegExp("^[a-zA-Z]+[a-zA-Z0-9\_\.]+[@]{1}[a-zA-Z]+[\.]{1}[a-zA-Z]+$");

      if(!emailfilter.test(EmailTB.value))
        {
          alert("Invalid email ID.");
          return false;
           EmailTB.focus();
        }

      var PhoneTB = document.getElementById("phnumber");

      var phonefilter = new RegExp("[0-9]{10}$");

      if(!phonefilter.test(PhoneTB.value))
        {
          alert("Phone number must have 10 digit");
          PhoneTB.focus();
          return false;
        }


        var photoTB = document.getElementById("image").value;
         /*var photofilter= new RegExp("^[a-zA-Z\ ]+$","g");*/
      if(photoTB == '')
        {
          alert("Select a file.");
          return false;
        }

        else
        {
          var extension = photoTB.substring(photoTB.lastIndexOf('.') +1).toLowerCase();
          if(extension == "jpg" || extension == "png" || extension == "gif" || extension == "jpeg")

          {
           /* alert("file format is not valid");
            return false;*/
          }

          else
          {
            alert("Invalid format");
            document.getElementById("image").value = '';
            return false;
          }

        }

      
    }

</script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<div class="table-responsive">
    <table class="table">

<div class="panel-heading" align="center" style="background-color:#151414;" >

                   
                    <h1 align="center"> 
                   
                        UPDATE

                    
                    </h1>
                </div>



<form method="post" action="{{ url('/store') }}" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    


  <div id="tab"class="col-sm-12" style="background-color:#43524B;">
    <table align="center">
      <tr>
         <td>
               <img  src="{{ url('images').'/'. $user->image}}" class="img-circle" id="disp_img" height="100" width="100">
         </td>
      </tr>
        <tr>
            <td>
                  <label for="name" class="col-md-4 control-label">
                    Name
                  </label>
            </td>
            <td>
                 <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="email" class="col-md-4 control-label">Email</label>
            </td>
            <td>
                 <input id="email" type="text" class="form-control" name="email" value="{{ $user->email }}">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="address" class="col-md-4 control-label">Address</label>
            </td>
            <td>
                 <input id="address" type="text" class="form-control" name="address" value="{{ $user->address }}">
            </td>
        </tr>
        <tr>
            <td>
                 <label for="phnumber" class="col-md-4 control-label">Phone Number</label>
            </td>
            <td>
                 <input id="phnumber" type="text" class="form-control" name="phnumber" value="{{ $user->phnumber }}">
            </td>
        </tr>



        <tr>
            <td>
                 <label for="file" class="col-md-4 control-label">Select Image </label>
            </td>
            <td>
                 <input id="image" type="file"  name="image">

                  <script type="text/javascript">
                     function readURL(input) {
                        if (input.files && input.files[0]) {
                           var reader = new FileReader();
                           reader.onload = function (e) {
                              $('#disp_img').attr('src', e.target.result);
                           }
                           reader.readAsDataURL(input.files[0]);
                        }
                     }
                     $("#image").change(function(){
                        alert("CHANGED");
                        readURL(this);
                     });
                  </script>
            </td>
            
        </tr>

             <tr>
            <td>
                 <button type="submit" class="btn btn-primary" align="center" onclick="return validate()">
                    Add</button>
            </td>
            
        </tr>        

    </table>

  </div>
</form>

</table>
</div>

@endsection