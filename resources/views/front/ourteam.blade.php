@extends("front.master")
@section("title","OurTeam | PN-Education")
@section("content")
<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Our Team</h1>
				<ul class="page-depth">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('ourteam')}}">Our Team</a></li>
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
						@foreach($team as $a)
						<div class="col-lg-3 col-md-6">
							<div class="teacher-post">
								<a href="#" data-toggle="modal" data-target="#smallModal">
									<img src="{{url('front/'.$a->image)}}" alt="">
									<div class="hover-post">
										<h2>{{$a->name}}</h2>
										<span>{{$a->about}}</span>
									</div>
								</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>	
			</div>
		</section>
		<!-- End teachers section -->
@endsection