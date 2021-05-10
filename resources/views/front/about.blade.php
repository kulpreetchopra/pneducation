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
				@foreach($about as $a)
				<div class="about-article">
					<div class="row">
						<div class="col-lg-6">
							<img src="{{url('front/'.$a->image)}}" alt="" style="height:330px">
						</div>
						<div class="col-lg-6">
							<div class="article-content">
								<h2><i style="color:#1A237E" class="{{$a->icon}}"></i> {{$a->title}}</h2>
								<p>{{$a->about}}</p>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</section>
		<!-- End about section -->

		<!-- statistic-section 
			================================================== -->
		<section class="statistic-section" style="background-color: #1A237E">
			<div class="container">
				<div class="statistic-box">
					<div class="row">
						<div class="col-lg-3 col-sm-6">
							<div class="statistic-post">
								<span class="timer" data-from="0" data-to="{{$course->count()}}"></span>
								<p>Courses <br> Completed</p>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="statistic-post">
								<span class="timer" data-from="0" data-to="{{$signup->count()}}"></span>
								<p>Registration <br> Completed</p>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="statistic-post">
								<span class="timer" data-from="0" data-to="{{$subscribe->count()}}"></span>
								<p>Subscribers <br> Completed</p>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6">
							<div class="statistic-post">
								<span class="timer" data-from="0" data-to="{{$placement->count()}}"></span>
								<p>Placements <br> completed</p>
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
					<h1>Our Portfolio</h1>
					<p>PN-Education | PN-Infosys</p>
					<ul class="clients-list">
						@foreach($portfolio as $a)
						<li>
							<img src="{{url('front/'.$a->image)}}" alt="" style="height:160px">
							<a href="{{$a->url}}"><span>{{$a->title}}</span></a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</section>
		<!-- End clients section -->
@endsection