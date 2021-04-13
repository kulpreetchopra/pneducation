@extends("front.master")
@section("title","Thanks | PN-Education")
@section("content")
	        <center>
			@if(session('message'))
			<h1 class ="alert alert-success">
			    {{session('message')}}
			</h1>
			@endif
			@if(session('wmessage'))
			<h1 class ="alert alert-danger">
				{{session('wmessage')}}
		    </h1>
		    @endif
		    </center>
@endsection