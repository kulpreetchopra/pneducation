@extends("admin.master")
@section("title","Bill | PN-Education")
@section("content")
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bill</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Bill</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the Bill to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> PN-Education || PN-Infosys Pvt.Ltd.
                    <small class="float-right">Date: <?php
              $mytime = Carbon\Carbon::now();
              echo $mytime->toDateString();
              ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  @foreach($navbar as $a)
                  <address>
                    <strong>PN-Education || PN-Infosys Pvt.Ltd.</strong><br>
                    {{$a->address}}<br>
                    Phone: {{$a->contact}}<br>
                    Email: {{$a->email}}<br>
                    Timing: {{$a->timing}}
                  </address>
                  @endforeach
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  @foreach($corder as $a)
                  @if($id==$a->id)
                  <address>
                    <strong>{{$a->fname}} {{$a->lname}}</strong><br>
                    {{$a->address}}<br>
                    {{$a->city}}, {{$a->pincode}}, {{$a->state}}, {{$a->country}}<br>
                    Phone: {{$a->phone}}<br>
                    Email: {{$a->user_email}}
                  </address>
                  
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  @if($a->payment_methode=="Cash On Dilevery")
                  <br>
                  @endif
                  <b>Bill ID:</b> <?php echo uniqid('PN'); ?><br>
                  <b>Order ID:</b> {{$a->order_id}}<br>
                  @if($a->payment_methode!="Cash On Dilevery")
                  <b>Transaction ID:</b> {{$a->transaction_id}}<br>
                  @endif
                  <b>Payment Date:</b> {{$a->created_at}}<br>
                  <b>Payment Methode:</b> {{$a->payment_methode}}<br>
                  <b>Payment Status:</b> {{$a->order_status}} 
                  @if($a->order_status=="Complete")
                  <i class="fas fa-check-circle text-success"></i>
                  @else 
                  <i class="fas fa-spinner text-primary"></i>
                  @endif
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Id #</th>
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($corderd as $d)
                    @if($id==$d->course_order_id)
                    <tr>
                      <td>{{$d->course_id}}</td>
                      <td>{{$d->course_name}}</td>
                      <td>{{$d->course_quantity}}</td>
                      <td>₹{{$d->course_price}}</td>
                      <td>₹{{$d->course_price}}×{{$d->course_quantity}}</td>
                      <?php
                      $total=0;
                      $total=($d->course_price)*($d->course_quantity);
                      ?>
                      <td>₹<?php echo$total; ?></td>
                    </tr>
                    @endif
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="{{url('backend/dist/img/credit/visa.png')}}" alt="Visa">
                  <img src="{{url('backend/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                  <img src="{{url('backend/dist/img/credit/american-express.png')}}" alt="American Express')}}">
                  <img src="{{url('backend/dist/img/credit/paypal2.png')}}" alt="Paypal">
                  <img style="border: 1px solid orange;width:10%;height:12%" src="{{url('backend/dist/img/credit/paytm.jpg')}}" alt="Paypal">
                  <br><br>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    PN INFOSYS provides the best service possible to its customers because for us, our client’s happiness is important. Whatever we choose to do, we do it an exorbitant manner. PN INFOSYS Company provides a full range of maintenance and compliance services for Government and Commercial facilities.
                  </p>
                  @foreach($navbar as $n)
                  <img src="{{ url('/front/'.$n->logo) }}" alt=""></a>
                  @endforeach
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due: {{$a->created_at}}</p>
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>₹{{$a->subtotal}}</td>
                      </tr>
                      <tr>
                        <th>Coupan Code:</th>
                        <td>{{$a->coupan_code}}</td>
                      </tr>
                      <tr>
                        <th>Coupan Discount:</th>
                        <td>{{$a->coupan_discount}}% Off</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>₹{{$a->total}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{url('admin/billprint/'.$a->id)}}" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;"><i class="fas fa-print"></i> Generate PDF</a>
                </div>
              @endif
              @endforeach
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection