@extends("front.master")
@section("title","Account | Cart | PN-Education")
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
        <h3><b>Name :</b> {{$a->fname}} {{$a->lname}}</h3>
        <h3><b>Email :</b> {{$a->email}} <a href="#" data-toggle="modal" data-target="#password"><i class="material-icons">vpn_key</i></a></h3>
        <h3><b>Phone :</b> {{$a->phone}} <a href="#" data-toggle="modal" data-target="#phone"><i class="material-icons">edit</i></a></h3>
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
<div class="container border border-primary shadow-lg p-4 mb-4 bg-white">
  <h2 style="text-align: center;" class="border border-primary p-4 mb-4 bg-white"><b><i class="material-icons">shopping_cart</i> <u>Display Cart History</u> <i class="material-icons">shopping_cart</i></b></h2>
    <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr style="text-align: center;">
                  <th>S.N.</th>
                  <th>Course Id</th>
                  <th>Course Name</th>
                  <th>Course Image</th>
                  <th>Course Price</th>
                  <th>Course Quantity</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($cart as $a)
                  <tr style="text-align: center;">
                    <td>{{$a->id}}</td>
                    <td>{{$a->course_id}}</td>
                    <td>{{$a->course_name}}</td>
                    <td>
                      <img src="{{ url('course/'.$a->image) }}" style="height: 120px; width: 120px; border-radius: 100%;">
                    </td>
                    <td>₹{{$a->course_price}}</td>
                    <td>{{$a->course_quantity}}</td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr style="text-align: center;">
                  <th>S.N.</th>
                  <th>Course Id</th>
                  <th>Course Name</th>
                  <th>Course Image</th>
                  <th>Course Price</th>
                  <th>Course Quantity</th>
                </tr>
                </tfoot>
    </table>
 </div>
</div>
</div>
</div>
</div>
<br>
@endif
@endforeach
@endsection