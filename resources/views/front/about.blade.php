@extends("front.master")
@section("title","AboutUs | PN-Education")
@section("content")
		<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>About Us</h1>
				<ul class="page-depth">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('about')}}">About Us</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- about-section 
			================================================== -->
		<section class="about-section">
			<div class="container">
				<div class="about-article">
					<div class="row">
						<div class="col-lg-6">
							<img src="upload/about/about1.jpg" alt="">
						</div>
						<div class="col-lg-6">
							<div class="article-content">
								<i class="fa fa-file-text-o"></i>
								<h2>Who We Are</h2>
								<p>Maecenas ac efficitur turpis, et dictum elit. Aliquam vel suscipit arcu. Nunc condimentum erat arcu, vel eleifend metus tincidunt vel. Maecenas lacinia turpis diam, quis feugiat libero interdum vel.</p>
								<a class="text-link" href="#">Read More</a>
							</div>
						</div>
					</div>
				</div>
				<div class="about-article">
					<div class="row">
						<div class="col-lg-6">
							<div class="article-content right-align">
								<i class="fa fa-university"></i>
								<h2>Our Education</h2>
								<p>Maecenas ac efficitur turpis, et dictum elit. Aliquam vel suscipit arcu. Nunc condimentum erat arcu, vel eleifend metus tincidunt vel. Maecenas lacinia turpis diam, quis feugiat libero interdum vel.</p>
								<a class="text-link" href="#">Read More</a>
							</div>
						</div>
						<div class="col-lg-6">
							<img src="upload/about/about2.jpg" alt="">
						</div>
					</div>
				</div>
				<div class="about-article">
					<div class="row">
						<div class="col-lg-6">
							<img src="upload/about/about3.jpg" alt="">
						</div>
						<div class="col-lg-6">
							<div class="article-content">
								<i class="fa fa-umbrella"></i>
								<h2>Our Story</h2>
								<p>Maecenas ac efficitur turpis, et dictum elit. Aliquam vel suscipit arcu. Nunc condimentum erat arcu, vel eleifend metus tincidunt vel. Maecenas lacinia turpis diam, quis feugiat libero interdum vel.</p>
								<a class="text-link" href="#">Read More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End about section -->

		<!-- statistic-section 
			================================================== -->
		<section class="statistic-section">
			<div class="container">
				<div class="statistic-box">
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="statistic-post">
								<span class="timer" data-from="0" data-to="321"></span>
								<p>cases <br> completed</p>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="statistic-post">
								<span class="timer" data-from="0" data-to="200"></span>
								<p>cases <br> completed</p>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="statistic-post">
								<span class="timer" data-from="0" data-to="135"></span>
								<p>cases <br> completed</p>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="statistic-post">
								<span class="timer" data-from="0" data-to="28"></span>
								<p>cases <br> completed</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End statistic section -->

		<!-- clients-section 
			================================================== -->
		<section class="clients-section">
			<div class="container">
				<div class="clients-box">
					<h1>Our Partners</h1>
					<p>Sed vehicula consectetur rutrum</p>
					<ul class="clients-list">
						<li>
							<img src="images/clients/logo-client-1.png" alt="">
							<a href="#"><span>Honeydew</span></a>
						</li>
						<li>
							<img src="images/clients/logo-client-2.png" alt="">
							<a href="#"><span>Madison</span></a>
						</li>
						<li>
							<img src="images/clients/logo-client-3.png" alt="">
							<a href="#"><span>Everlane</span></a>
						</li>
						<li>
							<img src="images/clients/logo-client-4.png" alt="">
							<a href="#"><span>Henderson</span></a>
						</li>
						<li>
							<img src="images/clients/logo-client-5.png" alt="">
							<a href="#"><span>Andersen</span></a>
						</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- End clients section -->
@endsection