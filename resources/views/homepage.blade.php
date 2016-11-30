@if(Auth::User()==null)

@include('welcome')	

@else

	@if(Auth::User()->type=="admin")
		@include('admin.showcity')
	@else
		@include('welcome')
	@endif

@endif