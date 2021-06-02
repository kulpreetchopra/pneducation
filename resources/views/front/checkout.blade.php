@extends("front.master")
@section("title","Checkout | PN-Education")
@section("content")
<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Checkout</h1>
				<ul class="page-depth">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('checkout')}}">Checkout</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- cart-section 
			================================================== -->
		<section class="cart-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="cart-box">
							<h2>Billing details</h2>
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
							<form class="billing-details" method="post" action="{{url('checkout_submit')}}" enctype="multipart/form-data">
                             @csrf
                        @if(Auth::check())
                        <input type="hidden" name="user_id" value="{{Auth::User()->id}}">
                        @if(Auth::User()->google_id != NULL || Auth::User()->facebook_id != NULL)
                  		        <div class="row">
									<div class="col-lg-12">
										<label for="first-name">Full Name*</label>
										<input type="text" name="fname" id="first-name" value="{{Auth::User()->fname}}" readonly/>
									</div>
								</div>
								<label for="phone-name">Phone*</label>
								<input type="text" name="phone" id="phone-name" value="{{Auth::User()->phone}}"/>
								<label for="email-address">Email Address*</label>
								<input type="text" name="user_email" id="email-address" value="{{Auth::User()->email}}" readonly/>
                                @elseif(Auth::User()->google_id == NULL || Auth::User()->facebook_id == NULL)
								<div class="row">
									<div class="col-lg-6">
										<label for="first-name">First Name*</label>
										<input type="text" name="fname" id="first-name" value="{{Auth::User()->fname}}" readonly/>
									</div>
									<div class="col-lg-6">
										<label for="last-name">Last Name*</label>
										<input type="text" name="lname" id="last-name" value="{{Auth::User()->lname}}" readonly/>
									</div>
								</div>
								<label for="phone-name">Phone*</label>
								<input type="text" name="phone" id="phone-name" value="{{Auth::User()->phone}}" readonly/>
								<label for="email-address">Email Address*</label>
								<input type="text" name="user_email" id="email-address" value="{{Auth::User()->email}}" readonly/>
								@endif
                               @else
                    	        <div class="row">
									<div class="col-lg-6">
										<label for="first-name">First Name*</label>
										<input type="text" name="fname" id="first-name"/>
									</div>
									<div class="col-lg-6">
										<label for="last-name">Last Name*</label>
										<input type="text" name="lname" id="last-name"/>
									</div>
								</div>
								<label for="phone-name">Phone*</label>
								<input type="text" name="phone" id="phone-name"/>
								<label for="email-address">Email Address*</label>
								<input type="text" name="user_email" id="email-address"/>
								@endif
								<label for="country">Country*</label>
								<select id="country" name="country">
									<option>Country...</option>
									<option value="Albania">Albania</option>
									<option value="USA">USA</option>
									<option value="Canada">Canada</option>
									<option value="India">India</option>
									<option value="Germany">Germany</option>
									<option value="England">England</option>
									<option value="France">France</option>
									<option value="Italy">Italy</option>
									<option value="Australia">Australia</option>
								</select>
								<label for="street-name">Address *</label>
								<input type="text" name="address" id="street-name" placeholder="House number and street name" />
								<label for="city-name">Town / City*</label>
								<input type="text" name="city" id="city-name" />
								<label for="state-name">State / Country*</label>
								<input type="text" name="state" id="state-name" />
								<label for="postcode-name">Postcode / Zip*</label>
								<input type="text" name="pincode" id="postcode-name" />
								<label for="payment">Payment Methode*</label>
                                <input class="cod" type="radio" name="payment_methode"value="Cash On Dilevery"/>
                                <img style="border: 1px solid orange;width:25%;height:60px" src="{{url('backend/dist/img/credit/cod.png')}}" alt="Cash On Dilevery">&nbsp;&nbsp;
                                <input class="paytm" type="radio" name="payment_methode"value="Paytm"/>
                                <img style="border: 1px solid blue;width:25%;height:60px" src="{{url('backend/dist/img/credit/paytm.jpg')}}" alt="Paytm">
                                <br><br>
								<h2>Additional information</h2>
								<div class="row">
									<div class="col-lg-6">
										<label for="coupan">Coupan Code (optional)</label>
										<input type="text" name="coupan_code" placeholder="Coupon code">
									</div>
									<div class="col-lg-6">
										<label for="last-name">Check Coupan Validity (optional)</label>
										<input type="button" class="btn btn-block btn-info" value="Verify Coupan " name="Submit" onclick="Coupan()">
									</div>
								</div>
								<p class="text-success" id="statusy"></p>
								<p class="text-danger" id="statusn"></p>
								<br>
								<label for="notes">Order notes (optional)</label>
								<textarea name="order_note" id="notes" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="sidebar">
							<div class="widget cart-widget">
								<h2>Your order</h2>
								<table>
									<tbody>
										<tr>
											<th>Product</th>
											<th>Total</th>
										</tr>
										<?php $total_amount=0; ?>
									    @foreach($cart as $a)
									    <?php  
                                        $total_amount=$total_amount+($a->course_price*$a->course_quantity);
									    ?>
										<tr>
											<th class="name-pro">{{$a->course_name}}  × {{$a->course_quantity}}</th>
											<td>₹{{$a->course_price}}</td>
										</tr>
							            @endforeach
										<tr class="order-total">
											<th>Subtotal</th>
											<td>₹<?php echo$total_amount; ?></td>
											<input type="hidden" name="subtotal" value="<?php echo$total_amount; ?>">
										</tr>
										<tr class="order-total">
											<th>Total</th>
											<td class="total-price">₹<?php echo$total_amount; ?><p class="text-success" id="statusd"></p></td>
											<input type="hidden" name="total" value="<?php echo$total_amount; ?>">
										</tr>
									</tbody>
								</table>
								<input class="checkout-button" type="submit" name="submit" value="Proceed to Complete" onclick="return selectpaymentmethode();">
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</section>
	<script type="text/javascript">
	function Coupan() { 
	var x = document.getElementsByName("coupan_code")[0].value;
    var z = "Your entered coupan code "+x+" is not available or Expired !";
    var w = "Your entered coupan code "+x+" is Invalid, Please check again and retry !";
    <?php 
    foreach ($coupan as $c) {
    	?>
    	var y = "Your entered coupan code "+x+" is successfully verified and available to get "+<?php echo$c->discount;?>+"% discount !";
    	var d = <?php echo$c->discount;?>+"% Off";
    	if (x==<?php echo$c->coupan_code;?>) {
    		if(<?php echo$c->status;?>=='1'){
    		alert("Your entered coupan code "+x+" is successfully verified and available!\r\n"+"Coupan Code : "+x+"\r\nCoupan Discount : "+<?php echo$c->discount;?>+"%");
    		document.getElementById("statusy").innerHTML = y;
    		document.getElementById("statusd").innerHTML = d;
    		return; //stop the execution of function
    	    }
    	    else{
    		alert("Your entered coupan code "+x+" is not available or Expired!");
    		document.getElementById("statusn").innerHTML = z;
    		return;
    	    }
    	}
    	<?php
    }
    ?>
    alert("Your entered coupan code "+x+" is Invalid, Please check again and retry!");
    document.getElementById("statusn").innerHTML = w;
    }
		</script>
	<!-- End cart section -->
@endsection