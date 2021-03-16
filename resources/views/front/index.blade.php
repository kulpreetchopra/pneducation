@extends("front.master")
@section("title","Home | PN-Education")
@section("content")
		<!-- home-section 
			================================================== -->
		<section id="home-section">
			<div id="rev_slider_202_1_wrapper" class="rev_slider_wrapper" data-alias="concept1" style="background-color:#000000;padding:0px;">
				<!-- START REVOLUTION SLIDER 5.1.1RC fullscreen mode -->
				<div id="rev_slider_202_1" class="rev_slider" data-version="5.1.1RC">
					<ul>
						@foreach($banner as $a)
						<!-- SLIDE  -->
						<li data-index="rs-672" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="upload/slider/slider-image-1.jpg" data-rotate="0" data-saveperformance="off" data-title="unique" data-description="">
							<!-- MAIN IMAGE -->
							<img src="{{ url('/front/'.$a->bgimage) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->

							<!-- LAYER NR. 1 -->
							<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
								id="slide-672-layer-1" 
								data-x="['left','left','left','left']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['130','130','130','130']" 
								data-width="['530','530','430','420']" 
								data-height="330" 
								data-whitespace="nowrap" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="500" 
								data-responsive_offset="on" 
								style="z-index: 5;background-color:rgba(255, 255, 255, 1.00);border-color:rgba(0, 0, 0, 0);">
							</div>

							<!-- LAYER NR. 2 -->
							<div class="tp-caption Woo-TitleLarge tp-resizeme" 
								id="slide-672-layer-2" 
								data-x="['left','left','left','left']" 
								data-hoffset="['40','40','40','35']" 
								data-y="['top','top','top','top']" 
								data-voffset="['170','170','170','170']" 
								data-width="450" 
								data-height="none" 
								data-whitespace="normal" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="700" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 6; min-width: 370px; max-width: 450px; white-space: normal;text-align:left;">{{$a->title}}
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption tp-shape tp-shapewrapper tp-line-shape tp-resizeme"
								id="slide-672-layer-3" 
								data-x="['left','left','left','left']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['165','165','165','165']" 
								data-width="['3','3','3','3']" 
								data-height="100" 
								data-whitespace="nowrap" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="700" 
								data-responsive_offset="on" 
								style="z-index: 6;">
							</div>

							<!-- LAYER NR. 4 -->
							<div class="tp-caption Woo-Rating tp-resizeme" 
								id="slide-672-layer-4" 
								data-x="['left','left','left','left']" 
								data-hoffset="['40','40','40','35']" 
								data-y="['top','top','top','top']" 
								data-voffset="['286','286','286','286']" 
								data-width="450" 
								data-height="none" 
								data-whitespace="normal" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="800" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 8; min-width: 370px; max-width: 450px; white-space: normal; text-align:left;">
								{{$a->discription}}
							</div>

							<!-- LAYER NR. 5 -->
							<div class="tp-caption tp-resizeme"
								id="slide-672-layer-5" 
								data-x="['left','left','left','left']" 
								data-hoffset="['407','407','407','407']" 
								data-y="['top','top','top','top']" 
								data-voffset="['337','337','337','337']" 
								data-width="120" 
								data-height="none" 
								data-whitespace="normal" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="1100" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 10; min-width: 100px; max-width: 100px; white-space: normal; text-align:center;">
							</div>

							<!-- LAYER NR. 6 -->
							<a class="tp-caption Woo-ProductInfo rev-btn tp-resizeme" 
								href="http://server.local/revslider/product/premium-computer-hardware/" 
								target="_self" 
								id="slide-672-layer-6" 
								data-x="['left','left','left','left']" 
								data-hoffset="['40','40','40','35']" 
								data-y="['top','top','top','top']" 
								data-voffset="['370','370','370','370']" 
								data-width="none" 
								data-height="none" 
								data-whitespace="nowrap" 
								data-transform_idle="o:1;" 
								data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:200;e:Power1.easeInOut;" 
								data-style_hover="c:rgba(0, 0, 0, 1.00);bg:rgba(221, 221, 221, 1.00);cursor:pointer;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="1100" 
								data-splitin="none" 
								data-splitout="none" 
								data-actions='' 
								data-responsive_offset="on">
								Learn More
							</a>
						</li>
                     @endforeach
					</ul>
					<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
				</div>
			</div>
			<!-- END REVOLUTION SLIDER -->
		</section>
		<!-- End home section -->

		<!-- feature-section 
			================================================== -->
		<section class="feature-section">
			<div class="container">
				<div class="feature-box">
					<div class="row">
						<div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
									<i class="fa fa-umbrella"></i>
								</div>
								<div class="feature-content">
									<h2>
										Online Learn Courses Management
									</h2>
									<p>Analyzing negative materials about your brand and addressing them with sentiment analysis and press.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder color2">
									<i class="fa fa-id-card-o"></i>
								</div>
								<div class="feature-content">
									<h2>
										Learn from the masters of the field online
									</h2>
									<p>Analyzing negative materials about your brand and addressing them with sentiment analysis and press.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder color3">
									<i class="fa fa-handshake-o"></i>
								</div>
								<div class="feature-content">
									<h2>
										An Introduction-Skills For Learners
									</h2>
									<p>Analyzing negative materials about your brand and addressing them with sentiment analysis and press.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End feature section -->

		<!-- collection-section 
			================================================== -->
		<section class="collection-section">
			<div class="container">
				<div class="title-section">
					<div class="left-part">
						<span>Categories</span>
						<h1>Trending Collection</h1>
					</div>
					<div class="right-part">
						<a class="button-one" href="{{url('allcourses')}}">View All Courses</a>
					</div>
				</div>
				<!--  -->
				<div class="collection-box">
					<div class="row">
						<?php $i=1; ?>
						@foreach ($category as $a)
							@if($i==1)
							<div class="col-lg-6 col-md-12">
								<div class="collection-post">
									<div class="inner-collection">
										<img src="{{ url('/course/'.$a->image) }}" alt="course">
										<a href="{{url('allcategory/'.$a->id)}}" class="hover-post">
											<span class="title">{{$a->c_name}}</span>
											<span class="numb-courses">3 Courses</span>
										</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
							@elseif($i==2)
								<div class="collection-post">
									<div class="inner-collection">
										<img src="{{ url('/course/'.$a->image) }}" alt="course">
										<a href="{{url('allcategory/'.$a->id)}}" class="hover-post">
											<span class="title">{{$a->c_name}}</span>
											<span class="numb-courses">2 Courses</span>
										</a>
									</div>
								</div>
							@elseif($i==3)
								<div class="collection-post">
									<div class="inner-collection">
										<img src="{{ url('/course/'.$a->image) }}" alt="course">
										<a href="{{url('allcategory/'.$a->id)}}" class="hover-post">
											<span class="title">{{$a->c_name}}</span>
											<span class="numb-courses">3 Courses</span>
										</a>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-6">
							@elseif($i==4)
								<div class="collection-post">
									<div class="inner-collection">
										<img src="{{ url('/course/'.$a->image) }}" alt="course">
										<a href="{{url('allcategory/'.$a->id)}}" class="hover-post">
											<span class="title">{{$a->c_name}}</span>
											<span class="numb-courses">3 Courses</span>
										</a>
									</div>
								</div>
							@elseif($i==5)
								<div class="collection-post">
									<div class="inner-collection">
										<img src="{{ url('/course/'.$a->image) }}" alt="course">
										<a href="{{url('allcategory/'.$a->id)}}" class="hover-post">
											<span class="title">{{$a->c_name}}</span>
											<span class="numb-courses">3 Courses</span>
										</a>
									</div>
								</div>
							</div>
							@endif
							<?php $i++; ?>
						@endforeach
					</div>
				</div>
				<!--  -->
			</div>
		</section>
		<!-- End collection section -->
		<!-- countdown-section 
			================================================== -->
		<section class="countdown-section">
			<div class="container">
				<div class="countdown-box">
					<h1>Limited Time: Get My Book For Free!</h1>
					<p>Learn anytime, anywhere. Best Courses. Top Instituion.</p>
					<div class="countdown-item" data-date="2019/12/14">
						<div class="countdown-col">
							<span class="countdown-unit countdown-days">
								<span class="number" id="days"></span>
								<span class="text">days</span>
							</span>
						</div>
						<div class="countdown-col">
							<span class="countdown-unit countdown-hours">
								<span class="number" id="hours"></span>
								<span class="text">hours</span>
							</span>
						</div>
						<div class="countdown-col">
							<span class="countdown-unit countdown-min">
								<span class="number" id="minutes"></span>
								<span class="text">minutes</span>
							</span>
						</div>
						<div class="countdown-col">
							<span class="countdown-unit countdown-sec">
								<span class="number" id="seconds"></span>
								<span class="text">seconds</span>
							</span>
						</div>
					</div>
					<p>We offer professional SEO services that help websites increase their organic search score drastically in order to compete for the highest rankings.</p>
					<a class="button-two" href="#">Get my free book</a>
				</div>
			</div>
		</section>
		<!-- End countdown section -->

		<!-- popular-courses-section 
			================================================== -->
		<section class="popular-courses-section">
			<div class="container">
				<div class="title-section">
					<div class="left-part">
						<span>Education</span>
						<h1>Popular Courses</h1>
					</div>
					<div class="right-part">
						<a class="button-one" href="{{url('allcourses')}}">View All Courses</a>
					</div>
				</div>
				<div class="popular-courses-box">
					<div class="row">
                        @foreach($course as $a)
						<div class="col-lg-3 col-md-6">
							<div class="course-post">
								<div class="course-thumbnail-holder">
									<a href="{{url('courses/'.$a->id)}}">
										<img src="{{ url('/course/'.$a->c_image) }}" alt="">
									</a>
								</div>
								<div class="course-content-holder">
									<div class="course-content-main">
										<h2 class="course-title">
											<a href="{{url('courses/'.$a->id)}}">{{$a->c_name}}</a>
										</h2>
										<div class="course-rating-teacher">
											<div class="star-rating has-ratings" title="Rated 5.00 out of 5">
												<span style="width:100%">
													<span class="rating">5.00</span>
													<span class="votes-number">1 Votes</span>
												</span>
											</div>
											<a href="#" class="course-loop-teacher">{{$a->c_teacher}}</a>
										</div>
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
						</div>
						@if(($a->id)>8)
						@break
						@endif
                        @endforeach
					</div>
				</div>
			</div>
		</section>
		<!-- End popular-courses section -->
		
		<!-- testimonial-section 
			================================================== -->
		<section class="testimonial-section">
			<div class="container">
				<div class="testimonial-box owl-wrapper">
					
					<div class="owl-carousel" data-num="1">
					
						<div class="item">
							<div class="testimonial-post">
								<p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
								<div class="profile-test">
									<div class="avatar-holder">
										<img src="upload/testimonials/testimonial-avatar-1.jpg" alt="">
									</div>
									<div class="profile-data">
										<h2>Nicole Alatorre</h2>
										<p>Designer</p>
									</div>
								</div>
							</div>
						</div>
					
						<div class="item">
							<div class="testimonial-post">
								<p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
								<div class="profile-test">
									<div class="avatar-holder">
										<img src="upload/testimonials/testimonial-avatar-2.jpg" alt="">
									</div>
									<div class="profile-data">
										<h2>Nicole Alatorre</h2>
										<p>Designer</p>
									</div>
								</div>
							</div>
						</div>
					
						<div class="item">
							<div class="testimonial-post">
								<p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
								<div class="profile-test">
									<div class="avatar-holder">
										<img src="upload/testimonials/testimonial-avatar-3.jpg" alt="">
									</div>
									<div class="profile-data">
										<h2>Nicole Alatorre</h2>
										<p>Designer</p>
									</div>
								</div>
							</div>
						</div>
					
						<div class="item">
							<div class="testimonial-post">
								<p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
								<div class="profile-test">
									<div class="avatar-holder">
										<img src="upload/testimonials/testimonial-avatar-4.jpg" alt="">
									</div>
									<div class="profile-data">
										<h2>Nicole Alatorre</h2>
										<p>Designer</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- End testimonial section -->
@endsection