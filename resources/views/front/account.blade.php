@extends("front.master")
@section("title","Account | PN-Education")
@section("content")
<?php
if(Auth::check()){
  $id =Auth::User()->id;
}
?>
@foreach($user as $a)
@if($id==$a->id)
<div class="container">
  <br>
  <div class="row border border-primary shadow-lg p-4 mb-4 bg-white">
    <div class="col-md-6">
	    <h3>Name : {{$a->fname}} {{$a->lname}}</h3>
	    <h3>Email : {{$a->email}}</h3>
	    <h3>Phone : {{$a->phone}}</h3>
    </div>
    <div class="col-md-6">
      <div class="clearfix">
        <center>
          <span class="float-left"><a href="{{url('account/cart')}}"class="btn" style="background-color: #1A237E;color:white;">Cart History</a></span>
          <span class="float-right"><a href="{{url('account/order')}}" class="btn" style="background-color: #1A237E;color:white;">Order History</a></span>
          <br><br><br>
          <span class="float-left"><a href="{{url('account/bill')}}" class="btn" style="background-color: #1A237E;color:white;">Bill's History</a></span>
          <span class="float-right"><a href="{{url('account/contact')}}" class="btn" style="background-color: #1A237E;color:white;">Contact History</a></span>
        </center>
      </div> 
    </div>
  </div>
</div>
</section>
</div>
@endif
@endforeach
@endsection