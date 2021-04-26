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
		    <br>
		    @foreach($corder as $a)
		    @if($user_id==$a->user_id)
		    <a href="{{url('admin/billprint/'.$a->id)}}" target="_blank" class="btn btn-success">Print Your Bill ({{$a->created_at}})</a>
		    <br><br>
		    @endif
		    @endforeach
		    <br>
		    </center>
@endsection