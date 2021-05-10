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
                        @if(Auth::User()->google_id != NULL)
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
                                @elseif(Auth::User()->google_id == NULL)
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
								<h2>Additional information</h2>
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
											<td>Product</td>
											<td>Total</td>
										</tr>
										<?php $total_amount=0; ?>
									    @foreach($cart as $a)
									    <?php  
                                        $total_amount=$total_amount+($a->course_price*$a->course_quantity);
									    ?>
										<tr>
											<td class="name-pro">{{$a->course_name}}  × {{$a->course_quantity}}</td>
											<td>₹{{$a->course_price}}</td>
										</tr>
							            @endforeach
										<tr class="order-total">
											<th>Subtotal</th>
											<td>₹<?php echo$total_amount; ?></td>
										</tr>
										<tr class="order-total">
											<th>Total</th>
											<td class="total-price">₹<?php echo$total_amount; ?></td>
											<input type="hidden" name="total" value="<?php echo$total_amount; ?>">
										</tr>
									</tbody>
								</table>
								<input class="checkout-button" type="submit" name="submit" value="Proceed to Complete">
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</section>
		<!-- End cart section -->
@endsection