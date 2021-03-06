<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="csrf_token" value="{{ csrf_token() }}">
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <title>CLUBBERS</title>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
   
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
   {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

   

   <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
   <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
   <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>



   <!-- <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     -->



    <style>
        body {
            font-family: 'Lato';
             overflow-y: scroll;
        overflow-x: hidden;
            
        }


       /*  overflow-y: scroll;
       overflow-x: hidden; */

        .fa-btn {
            margin-right: 10px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top" >
      <!--   <div class="container"> -->
            <div class="navbar-header"  >

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                 <font color="#CDCCCE" face="Times New Roman" font-style="italic">   CLUBBERS </font>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse" style="background-color:#151414;">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">
                       <font color="#858080"> 

                        Home

                         </font>
                    </a></li>
                    <li><a href="{{ url('/listevent') }}">

                          <font color="#858080"> 


                        List Events

                         </font>
                    </a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"> 

                          <font color="#858080"> 
                            Login
                         </font> 
                         </a></li>
                        <li><a href="{{ url('/register') }}">
                           <font color="#858080"> 
                           
                            Register
                           </font>
                        </a></li>
                    @else
                    <li><a href="{{ url('/profile') }}">

                          <font color="#858080"> 
                        Profile
                      </font>
                    </a></li>

                     <li><a href="{{ url('/addevent') }}">

                    <font color="#858080"> 
                        Add Event
                        </font>

                    </a></li>  




                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               <font color="#858080"> 

                                {{ Auth::user()->name }} 

                              </font>
                                <span class="caret"></span>
                            </a>
        

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}


    <footer>
        
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script>
                $(function() {
                $( "#datepicker" ).datepicker();
                });
        </script>
    </footer>


</body>
</html>
