@extends("admin.master")
@section("title","Orders | PN-Education")
@section("content")
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Orders <a href="{{url('admin/print/orders')}}"><p class="btn btn-info"><i class="fas fa-print"></i> Print To PDF</p></a></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Home</a></li>
              <li class="breadcrumb-item active">All Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        @if(session('message'))
             <p class ="alert alert-success">
                {{session('message')}}
             </p>
          @endif
          @if(session('wmessage'))
             <p class ="alert alert-danger">
                {{session('wmessage')}}
             </p>
          @endif
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!------------ Data Table---- -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Display All Orders</h3>
              </div>
              <div class="card-body">
                   
              <table id="example1" class="table table-bordered table-hover table-striped table-responsive">
                <thead>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Customer Id</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Customer Phone</th>
                  <th>Customer Address</th>
                  <th>Order Id</th>
                  <th>Order Note</th>
                  <th>Order Status</th>
                  <th>Payment Methode</th>
                  <th>Transaction Id</th>
                  <th>Subtotal Amount</th>
                  <th>Coupan Code</th>
                  <th>Coupan Discount(%)</th>
                  <th>Total Amount</th>
                  <th>Payment Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($orders as $a)
                  <tr style="text-align: center;">
                    <td>{{$a->id}}</td>
                    <td>{{$a->user_id}}</td>
                    <td>{{$a->fname}} {{$a->lname}}</td>
                    <td>{{$a->user_email}}</td>
                    <td>{{$a->phone}}</td>
                    <td>{{$a->address}},{{$a->city}},{{$a->pincode}},{{$a->state}},{{$a->country}}</td>
                    <td>{{$a->order_id}}</td>
                    <td>{{$a->order_note}}</td>
                    <td>{{$a->order_status}}</td>
                    <td>{{$a->payment_methode}}</td>
                    <td>{{$a->transaction_id}}</td>
                    <td>₹{{$a->subtotal}}</td>
                    <td>{{$a->coupan_code}}</td>
                    <td>{{$a->coupan_discount}}</td>
                    <td>₹{{$a->total}}</td>
                    <td>{{$a->created_at}}</td>
                    <td>
                      <a href="{{url('admin/bill/'.$a->id)}}"><p class="btn btn-info"><i class="fas fa-print"></i></p></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr style="text-align: center;">
                  <th>Id</th>
                  <th>Customer Id</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Customer Phone</th>
                  <th>Customer Address</th>
                  <th>Order Id</th>
                  <th>Order Note</th>
                  <th>Order Status</th>
                  <th>Payment Methode</th>
                  <th>Transaction Id</th>
                  <th>Subtotal Amount</th>
                  <th>Coupan Code</th>
                  <th>Coupan Discount(%)</th>
                  <th>Total Amount</th>
                  <th>Payment Date</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    </div>
<!-- ------End Data Table------- -->
  </div>
  <!-- /.content-wrapper -->
@endsection