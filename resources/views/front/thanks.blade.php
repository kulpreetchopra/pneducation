@extends("front.master")
@section("title","Thanks | PN-Education")
@section("content")
	        <center>
	        <br>
	        <div class="container">
	        @if(session('message'))
			<h1 class ="border border-primary alert alert-success">
			    {{session('message')}}
			</h1>
			@endif
			@if(session('wmessage'))
			<h1 class ="alert alert-danger">
				{{session('wmessage')}}
		    </h1>
		    @endif
		    </div>
		    </center>
@endsection