@extends("front.master")
@section("title","Home | PN-Education")
@section("content")
<div style="margin-top:220px!important;" class="modal fade" id="mymodel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div style="background-color:#1A237E;color:white;" class="modal-header  lg alert ">
            <h4 class="modal-title" ><i class="fa fa-bell fa-pad  faa-ring animated" aria-hidden="true" style="color:white"></i> Important Alerts</h4>
            <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4 style="color:#1A237E">Latest Updates</h4>
            <ul>
              <li><a style="color: black;" href="#">
                <img class="alignnone size-full wp-image-2179" src="data:image/png;base64,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" alt="" width="35" height="25">New Batch Of Python Started From 20 July 2020<br></a></li><br>
            </ul>
          <hr>
            <center>
              <h3 style="background-color:#07a6f02b">
              	@foreach($navbar as $a)
                <a href="{{$a->facebook}}"><i class="fab fa-facebook-square fa-2x" style="color: #3e1afb;font-size: 30px;"></i></a>
                <a href="{{$a->twitter}}"><i class="fab fa-twitter" style="color:#1a87fb; font-size: 30px;"></i></a>
                <a href="{{$a->instagram}}"><i class="fab fa-instagram fa-2x" style="color:#d7078e; font-size: 30px;"></i></a>
                <a href="{{$a->linkedin}}"><i class="fab fa-linkedin fa-2x" style="color:#0b9ae1; font-size: 30px;"></i></a>
                @endforeach
              </h3>
            </center>

      </div>
  </div>
  </div>
  </div>
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