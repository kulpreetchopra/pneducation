@extends("front.master")
@section("title","Courses List | PN-Education")
@section("content")
<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Courses</h1>
				<ul class="page-depth">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><a href="{{url('allcourses')}}">Courses</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- courses-section 
			================================================== -->
		<section class="courses-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="courses-top-bar">
							<div class="courses-view">
								<a href="{{url('allcourses')}}" class="grid-btn">
									<i class="fa fa-th-large" aria-hidden="true"></i>
								</a>
								<a href="{{url('courseslist')}}" class="grid-btn active">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</a>
								<span>Showing all {{$course->count('id')}} results</span>
							</div>
							<form class="search-course">
								<input type="search" name="search" id="search_course" placeholder="Search Courses..." />
								<button type="submit">
									<i class="material-icons">search</i>
								</button>
							</form>
						</div>
                        @foreach($course as $a)
						<div class="course-post list-style">
							<div class="course-thumbnail-holder">
								<a href="single-course.html">
									<img src="{{ url('/course/'.$a->c_image) }}" alt="">
								</a>
							</div>
							<div class="course-content-holder">
								<div class="course-content-main">
									<h2 class="course-title">
										<a href="single-course.html">{{$a->c_name}}</a>
									</h2>
									<div class="course-rating-teacher">
										<div class="star-rating has-ratings" title="Rated 5.00 out of 5">
											<span style="width:100%">
												<span class="rating">5.00</span>
												<span class="votes-number">1 Votes</span>
											</span>
										</div>
										<a href="#" class="course-loop-teacher">{{ $a->c_teacher }}</a>
									</div>
									<p>What Will I Learn? Improve your productivity, get things done, and find more time for what's most…</p>
								</div>
								<div class="course-content-bottom">
									<div class="course-students">
										<i class="material-icons">group</i>
										<span>64</span>
									</div>
									<div class="course-price">
										<span>₹{{$a->c_price}}</span>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>

					<div class="col-lg-4">
						<div class="sidebar">

							<div class="category-widget widget">
								<h2>Course categories</h2>
								<ul class="category-list">
									@foreach($category as $a)
									<li><a href="{{url('allcategory/'.$a->id)}}">{{$a->c_name}}</a></li>
									@endforeach
								</ul>
							</div>

							<div class="products-widget widget">
								<h2>All Courses</h2>
								<ul class="products-list">
									@foreach($course as $a)
									<li>
										<a href="{{url('courses/'.$a->id)}}"><img src="{{ url('/course/'.$a->c_image) }}" alt=""></a>
										<div class="list-content">
											<h3><a href="{{url('courses/'.$a->id)}}">{{$a->c_name}}</a></h3>
											<span>₹{{$a->c_price}}</span>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>

				</div>
						
			</div>
		</section>
		<!-- End courses section -->
@endsection