@extends("front.master")
@section("title","Cart | PN-Education")
@section("content")
<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Cart</h1>
				<ul class="page-depth">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('/addtocart')}}">Cart</a></li>
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
							<table class="shop_table table-responsive">
								<thead>
									<tr>
										<th class="product-remove">&nbsp;</th>
										<th class="product-thumbnail">&nbsp;</th>
										<th class="product-name">Course</th>
										<th class="product-price">Price</th>
										<th class="product-quantity">Quantity</th>
										<th class="product-subtotal">Total</th>
									</tr>
								</thead>
								<tbody>
									@foreach($cart as $a)
									<tr>
										<td class="product-remove">
											<a href="#" class="remove">×</a>
										</td>
										<td class="product-thumbnail">
											<a href="#"><img src="{{ url('/course/'.$a->image) }}" alt=""></a>
										</td>
										<td class="product-name">
											<a href="#">{{$a->course_name}}</a>
										</td>
										<td class="product-price">₹{{$a->course_price}}
										</td>
										<td class="product-quantity">
											<input type="number" value="{{$value}}"/>
										</td>
										<td class="product-subtotal">₹{{($a->course_price)*$value}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="sidebar">
							<div class="widget cart-widget">
								<h2>Cart Totals</h2>
								<table>
									<tbody>
										<tr class="cart-subtotal">
											<th>Subtotal</th>
											<td>273.99</td>
										</tr>
										<tr class="order-total">
											<th>Total</th>
											<td>273.99</td>
										</tr>
									</tbody>
								</table>
								<a href="checkout.html" class="checkout-button">Proceed to checkout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End cart section -->
@endsection