@extends("front.master")
@section("title","Workshops | PN-Education")
@section("content")
<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Portfolio</h1>
				<ul class="page-depth">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('workshop')}}">Workshops</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- portfolio-section 
			================================================== -->
		<section class="portfolio-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4">
						<div class="sidebar">
							<div class="filter-widget widget">
								<h2>Filter Controls</h2>
								<ul class="filter">
									<li><a class="active" href="#" data-filter="*">All Workshops</a></li>
									<li><a href="#" data-filter=".Rjit">Rjit College</a></li>
									<li><a href="#" data-filter=".Mpct">Mpct College</a></li>
									<li><a href="#" data-filter=".Xiaomi">Xiaomi MI Company</a></li>
									<li><a href="#" data-filter=".BentChair">BentChair Company</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-9 col-md-8">
						<div class="portfolio-box iso-call">
							@foreach($workshop as $a)
							@if($a->title=="Rjit College")
							<div class="project-post Rjit">
								<div class="inner-project">
									<div class="image-holder">
										<img src="{{ url('/front/'.$a->image) }}" alt="" style="height:220px;width:280px;">
									</div>
								</div>
							</div>
							@endif
							@if($a->title=="Mpct College")
							<div class="project-post Mpct">
								<div class="inner-project">
									<div class="image-holder">
										<img src="{{ url('/front/'.$a->image) }}" alt="" style="height:220px;width:280px;">
									</div>
								</div>
							</div>
							@endif
							@if($a->title=="Xiaomi MI Company")
							<div class="project-post Xiaomi">
								<div class="inner-project">
									<div class="image-holder">
										<img src="{{ url('/front/'.$a->image) }}" alt="" style="height:220px;width:280px;">
									</div>
								</div>
							</div>
							@endif
							@if($a->title=="BentChair Company")
							<div class="project-post BentChair">
								<div class="inner-project">
									<div class="image-holder">
										<img src="{{ url('/front/'.$a->image) }}" alt="" style="height:220px;width:280px;">
									</div>
								</div>
							</div>
							@endif
                            @endforeach
						</div>
					</div>
				</div>
					
			</div>
		</section>
		<!-- End portfolio section -->
@endsection