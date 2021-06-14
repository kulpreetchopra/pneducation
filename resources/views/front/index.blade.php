@extends("front.master")
@section("title","Home | PN-Education")
@section("content")
<!-- large modal -->
<div class="modal fade" id="mymodel" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true" style="margin-top:220px!important;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#1A237E;color:white;">
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-bell fa-pad  faa-ring animated" aria-hidden="true" style="color:white"></i> Important Alerts</h4>
        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 style="color:#1A237E">Latest Updates</h4>
            <h6><?php
            	$mytime = Carbon\Carbon::now();
            	echo $mytime->toDateString();
            	?></h6>
            <ul>
              @foreach($alert as $a)
              @if($mytime->toDateString()<($a->end_date))
              <li><a style="color: black;" href="{{url('allcourses')}}">{{$a->title}} {{$a->start_date}} {{$a->start_time}}
            <?php
			$day = strtotime($a->start_date);
			$current=strtotime('now');
			$diffference =($day-$current);
			$days=floor($diffference / (60*60*24));
			if($days<0){
				echo "";
			}
			else{
				echo "( $days Days Left )";
			}
			?></a></li>
            @endif
            @endforeach  
            <br>
            </ul>
        	<center>
        	  <hr>
              <h3 style="background-color:#07a6f02b">
              	@foreach($navbar as $a)
                <a class="icon" style="color:white;background-color: #3b5998;" href="{{$a->facebook}}"><i class="fa fa-facebook-f"></i></a>
                &nbsp;
                <a class="icon" style="color:white;background-color: #1DA1F2;" href="{{$a->twitter}}"><i class="fa fa-twitter"></i></a>
                &nbsp;
                <a class="icon" style="color:white;background-color: #d7078e;" href="{{$a->instagram}}"><i class="fa fa fa-instagram"></i></a>
                &nbsp;
                <a class="icon" style="color:white;background-color: #2867B2;" href="{{$a->linkedin}}"><i class="fa fa-linkedin"></i></a>
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
								href="{{url('allcourses')}}" 
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
						<!-- slide2 -->
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
						@foreach($special as $a)
						<div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
									<i class="{{$a->icon}}"></i>
								</div>
								<div class="feature-content">
									<h2>{{$a->title}}</h2>
									<p>{{$a->about}}</p>
								</div>
							</div>
						</div>
                        @endforeach
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
						@if($a->c_status=="1")
							<div class="col-lg-4 col-md-12">
								<div class="collection-post">
									<div class="inner-collection">
										<img src="{{ url('/course/'.$a->image) }}" alt="">
										<a href="{{url('allcategory/'.$a->id)}}" class="hover-post">
											<span class="title">{{$a->c_name}}</span>
											<span class="numb-courses">
											{{$course->where('c_category',$a->c_name)->count()}}</span>
										</a>
									</div>
								</div>
							</div>
						<?php 
						$i++;
						if($i>6){
							break;
						} 
						?>
						@endif
						@endforeach
					</div>
				</div>
				<!--  -->
			</div>
		</section>
		<!-- End collection section -->
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
											        <?php $vote=0; ?>
													@foreach($rating as $r)
													@if($r->course_name==$a->c_name)
													<?php $vote++; ?>
													@endif
													@endforeach
											<div class="star-rating has-ratings" title="<?php echo$vote; ?> Users Subscribed To This Course">
												<span style="width:100%">
													<span class="rating"><?php echo$vote; ?></span>
													<span class="votes-number"> Votes</span>
												</span>
											</div>
											<a href="#" class="course-loop-teacher">{{$a->c_teacher}}</a>
										</div>
									</div>
									<div class="course-content-bottom">
										<div class="course-students">
											        <?php $order=0; ?>
													@foreach($c_order as $c)
													@if($c->course_name==$a->c_name)
													<?php $order++; ?>
													@endif
													@endforeach
											<i class="material-icons">group</i>
											<span><?php echo$order; ?></span>
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
					    @foreach($team as $a)
						<div class="item">
							<div class="testimonial-post">
								<p>“{{$a->comment}}”</p>
								<div class="profile-test">
									<div class="avatar-holder">
										<img src="{{ url('/front/'.$a->image) }}" alt="" style="height: 100px;width: 120px;">
									</div>
									<div class="profile-data">
										<h2>{{$a->name}}</h2>
										<p>{{$a->about}}</p>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
		<!-- End testimonial section -->
@endsection