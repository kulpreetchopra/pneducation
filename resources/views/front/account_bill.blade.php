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
        <h3><b>Email :</b> {{$a->email}}</h3>
        <h3><b>Phone :</b> {{$a->phone}}</h3>
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
  <h2 style="text-align: center;" class="border border-primary p-4 mb-4 bg-white"><b><i class="material-icons">shopping_cart</i> <u>Display Bill History</u> <i class="material-icons">shopping_cart</i></b></h2>
    <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr style="text-align: center;">
                  <th>Order Id</th>
                  <th>Order Note</th>
                  <th>Order Status</th>
                  <th>Payment Methode</th>
                  <th>Coupan Code</th>
                  <th>Coupan Amount</th>
                  <th>Total Amount</th>
                  <th>Payment Date</th>
                  <th>Bill Print</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($bill as $a)
                  <tr style="text-align: center;">
                    <td>{{$a->id}}</td>
                    <td>{{$a->order_note}}</td>
                    <td>{{$a->order_status}}</td>
                    <td>{{$a->payment_methode}}</td>
                    <td>{{$a->coupan_code}}</td>
                    <td>{{$a->coupan_amount}}</td>
                    <td>₹{{$a->total}}</td>
                    <td>{{$a->created_at}}</td>
                    <td>
                      <a href="{{url('admin/billprint/'.$a->id)}}"><p class="btn btn-info"><i class="material-icons">file_download</i></p></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr style="text-align: center;">
                  <th>Order Id</th>
                  <th>Order Note</th>
                  <th>Order Status</th>
                  <th>Payment Methode</th>
                  <th>Coupan Code</th>
                  <th>Coupan Amount</th>
                  <th>Total Amount</th>
                  <th>Payment Date</th>
                  <th>Bill Print</th>
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