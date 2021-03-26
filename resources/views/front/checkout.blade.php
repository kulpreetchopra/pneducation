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
							<form class="billing-details">
								<div class="row">
									<div class="col-lg-6">
										<label for="first-name">First Name*</label>
										<input type="text" id="first-name" />
									</div>
									<div class="col-lg-6">
										<label for="last-name">Last Name*</label>
										<input type="text" id="last-name" />
									</div>
								</div>
								<label for="company-name">Company name (optional)</label>
								<input type="text" id="company-name" />
								<label for="country">Country*</label>
								<select id="country">
									<option>Country...</option>
									<option>Albania</option>
									<option>USA</option>
									<option>Canada</option>
									<option>Brazil</option>
									<option>Germany</option>
									<option>England</option>
									<option>France</option>
									<option>Italy</option>
									<option>Australia</option>
								</select>
								<label for="street-name">Street address *</label>
								<input type="text" id="street-name" placeholder="House number and street name" />
								<input type="text" id="street-name2" placeholder="Apartment, suite, unit etc. (optional)" />
								<label for="city-name">Town / City*</label>
								<input type="text" id="city-name" />
								<label for="state-name">State / Country*</label>
								<input type="text" id="state-name" />
								<label for="postcode-name">Postcode / Zip*</label>
								<input type="text" id="postcode-name" />
								<label for="phone-name">Phone*</label>
								<input type="text" id="phone-name" />
								<label for="email-address">Email Address*</label>
								<input type="text" id="email-address" />
								<h2>Additional information</h2>
								<label for="notes">Order notes (optional)</label>
								<textarea id="notes" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
							</form>
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
										<tr>
											<td class="name-pro">Introduction Web Design with HTML  × 1</td>
											<td>$244</td>
										</tr>
										<tr>
											<td class="name-pro">Distance Learning MBA Management  × 1</td>
											<td>$29.99</td>
										</tr>
										<tr class="order-total">
											<th>Subtotal</th>
											<td>273.99</td>
										</tr>
										<tr class="order-total">
											<th>Total</th>
											<td class="total-price">273.99</td>
										</tr>
									</tbody>
								</table>
								<a href="#" class="checkout-button">Proceed to Paypal</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End cart section -->
@endsection