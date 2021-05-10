@extends("front.master")
@section("title","OurInterns | PN-Education")
@section("content")
<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Our Interns</h1>
				<ul class="page-depth">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('interns')}}">Our Interns</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- teachers-section 
			================================================== -->
		<section class="teachers-section">
			<div class="container">
				<div class="teachers-box">
					<div class="row">
						@foreach($interns as $a)
						<div class="col-lg-3 col-md-6">
							<div class="teacher-post">
								<!-- <a href="#" data-toggle="modal" data-target="#smallModal"> -->
									<img src="{{url('front/'.$a->image)}}" alt="" style="height: 280px;">
									<div class="hover-post">
										<h2>{{$a->name}}</h2>
										<span>{{$a->company}} | </span>
										<span>{{$a->designation}}</span>
									</div>
								<!-- </a> -->
							</div>
						</div>
						@endforeach
					</div>
				</div>	
			</div>
		</section>
		<!-- End teachers section -->
@endsection