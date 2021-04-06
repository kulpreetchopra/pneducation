@extends("front.master")
@section("title","Courses | PN-Education")
@section("content")
<!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>{{$course->c_name}}</h1>
				<ul class="page-depth">
					<li><a href="{{url('/')}}">PN-Education</a></li>
					<li><a href="{{url('/allcourses')}}">Courses</a></li>
					<li><a href="{{url('courses/'.$course->id)}}">{{$course->c_name}}</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- single-course-section 
			================================================== -->
		<section class="single-course-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">

						<div class="single-course-box">

							<!-- single top part -->
							<div class="product-single-top-part">
								<div class="product-info-before-gallery">
									<div class="course-author before-gallery-unit">
										<div class="icon">
											<i class="material-icons">account_box</i>
										</div>
										<div class="info">
											<span class="label">Teacher</span>
											<div class="value">
												{{$course->c_teacher}}
											</div>
										</div>
									</div>
									<div class="course-category before-gallery-unit">
										<div class="icon">
											<i class="material-icons">bookmark_border</i>
										</div>
										<div class="info">
											<span class="label">Category</span>
											<div class="value">
												{{$course->c_category}}<span></span>
											</div>
										</div>
									</div>
									<div class="course-rating before-gallery-unit">
										<div class="star-rating has-ratings">
											<span class="rating">4.50</span>
											<span class="votes-number">2 Votes</span>
										</div>
									</div>
								</div>
								<div class="course-single-gallery">
									<img src="{{ url('/course/'.$course->c_image) }}" alt="">
								</div>

							</div>

							<!-- single course content -->
							<div class="single-course-content">
								<h2>What Will I Learn?</h2>
								<p>{{$course->c_discription}}</p>
								<h2>Learning Objectives</h2>
								<div class="row">
									<div class="col-md-6">
										<ul class="list">
											<li>Lorem ipsum dolor sit amet, consectetur</li>
											<li>Nullam condimentum metus quis magna egestas</li>
											<li>Mauris lobortis metus in pharetra posuere</li>
											<li>Suspendisse sed est luctus nibh tempor</li>
										</ul>
									</div>
									<div class="col-md-6">
										<ul class="list">
											<li>Nullam condimentum metus quis magna egestas</li>
											<li>Mauris lobortis metus in pharetra posuere</li>
											<li>Suspendisse sed est luctus nibh tempor</li>
										</ul>
									</div>
								</div>
								<h2>Prior Knowledge</h2>
								<p>Improve your productivity, get things done, and find more time for what’s most important with Time Management Tips. This weekly series provides actionable time management techniques to help people better manage their time and ultimately become more productive. Time management expert Dave Crenshaw provides a new tip every Monday, touching on a wide variety of topics.</p>

								<!-- course section -->
								<div class="course-section">
									<h3>1. Introduction</h3>
									<div class="panel-group">
										<div class="course-panel-heading">
											<div class="panel-heading-left">
												<div class="course-lesson-icon">
													<i class="fa fa-play-circle-o"></i>
												</div>
												<div class="title">
													<h4>1.1 Introduction <span class="badge-item video">video</span>
													</h4>
													<p class="subtitle">01:10</p>
												</div>
											</div>
											<div class="panel-heading-right">
												<a class="video-lesson-preview preview-button" href="https://www.youtube.com/watch?v=4BJY-bgHqtI">
													<i class="fa fa-play-circle"></i>Preview
												</a>
											</div>
										</div>
										<div class="panel-content">
											<div class="panel-content-inner">
												Welcome to How to Customize a Logo Sting! In this course you’ll learn how to take a basic After Effects sting logo treatment and customise it to work for your brand. Are you new to After Effects? No worries! This course is designed for people who are new to After Effects or have never used it!
											</div>
										</div>
										<div class="course-panel-heading">
											<div class="panel-heading-left">
												<div class="course-lesson-icon">
													<i class="fa fa-files-o"></i>
												</div>
												<div class="title">
													<h4>Project Files<span class="badge-item practice">practice</span></h4>
													<p class="subtitle">Accessing the project files</p>
												</div>
											</div>
											<div class="panel-heading-right">
												<div class="private-lesson">
													<i class="fa fa-lock"></i>
													<span>Private</span>
												</div>
											</div>
										</div>
										<div class="panel-content">
											<div class="panel-content-inner">
												This lesson is private, for full access to all lessons you need to buy this course.
											</div>
										</div>
									</div>
								</div>
								<!-- end course section -->

								<!-- course section -->
								<div class="course-section">
									<h3>2. Getting Started</h3>
									<div class="panel-group">
										<div class="course-panel-heading">
											<div class="panel-heading-left">
												<div class="course-lesson-icon"> 
													<i class="fa fa-play-circle-o"></i>
												</div>
												<div class="title">
													<h4>2.1 After Effects Tour <span class="badge-item free">free</span></h4>
													<p class="subtitle">Quick tour of the After Effects interface</p>
												</div>
											</div>
										</div>
										<div class="panel-content">
											<div class="panel-content-inner"> In this lesson you are going to open up the project, get a quick tour of the After Effects interface, and learn how the project is organized. After Effects is a massive application, but this lesson is only going to focus on what you need to know to work with this logo sting project!</div>
										</div>
										<div class="course-panel-heading">
											<div class="panel-heading-left">
												<div class="course-lesson-icon">
													<i class="fa fa-play-circle-o"></i>
												</div>
												<div class="title">
													<h4>2.2 Layers, Comps, and Precomps</h4>
													<p class="subtitle">08:57</p>
												</div>
											</div>
											<div class="panel-heading-right">
												<div class="private-lesson">
													<i class="fa fa-lock"></i><span>Private</span>
												</div>
											</div>
										</div>
										<div class="panel-content">
											<div class="panel-content-inner"> This lesson is private, for full access to all lessons you need to buy this course.</div>
										</div>
									</div>
								</div>
								<!-- end course section -->

								<!-- course section-->
								<div class="course-section">
									<h3>3. Customize!</h3>
									<div class="panel-group">
										<div class="course-panel-heading">
											<div class="panel-heading-left">
												<div class="course-lesson-icon">
													<i class="fa fa-download"></i>
												</div>
												<div class="title">
													<h4>3.1 Logo Replacement <span class="badge-item lecture">lecture</span></h4>
													<p class="subtitle">14:40</p>
												</div>
											</div>
											<div class="panel-heading-right">
												<div class="private-lesson">
													<i class="fa fa-lock"></i>
													<span>Private</span>
												</div>
											</div>
										</div>
										<div class="panel-content">
											<div class="panel-content-inner"> This lesson is private, for full access to all lessons you need to buy this course.</div>
										</div>
										<div class="course-panel-heading">
											<div class="panel-heading-left">
												<div class="course-lesson-icon">
													<i class="fa fa-play-circle-o"></i>
												</div>
												<div class="title">
													<h4>3.2 Color Tweaks</h4>
													<p class="subtitle">03:54</p>
												</div>
											</div>
											<div class="panel-heading-right">
												<a class="video-lesson-preview preview-button" href="https://www.youtube.com/watch?v=4BJY-bgHqtI">
													<i class="fa fa-play-circle"></i>Preview
												</a>
												<div class="private-lesson">
													<i class="fa fa-lock"></i>
													<span>Private</span>
												</div>
											</div>
										</div>
										<div class="panel-content">
											<div class="panel-content-inner"> This lesson is private, for full access to all lessons you need to buy this course.</div>
										</div>
										<div class="course-panel-heading">
											<div class="panel-heading-left">
												<div class="course-lesson-icon">
													<i class="fa fa-play-circle-o"></i>
												</div>
												<div class="title">
													<h4>3.3 Adding Music <span class="badge-item video">video</span></h4>
													<p class="subtitle">09:13</p>
												</div>
											</div>
											<div class="panel-heading-right">
												<div class="private-lesson">
													<i class="fa fa-lock"></i>
													<span>Private</span>
												</div>
											</div>
										</div>
										<div class="panel-content">
											<div class="panel-content-inner"> This lesson is private, for full access to all lessons you need to buy this course.</div>
										</div>
									</div>
								</div>
								<!-- end course section -->

								<!-- course section-->
								<div class="course-section">
									<h3>4. Wrapping Up</h3>
									<div class="panel-group">
										<div class="course-panel-heading">
											<div class="panel-heading-left">
												<div class="course-lesson-icon">
													<i class="fa fa-question-circle"></i>
												</div>
												<div class="title">
													<h4>4.1 Export &amp; Practice <span class="badge-item quiz">quiz</span></h4>
													<p class="subtitle">Course quiz</p>
												</div>
											</div>
										</div>
										<div class="panel-content">
											<div class="panel-content-inner"> Now you have your logo sting modified with your logo and a short musical sting, you need to get it out of After Effects so you can use it in other projects. In this lesson you’ll learn how to setup a render and export your video!</div>
										</div>
										<div class="course-panel-heading">
											<div class="panel-heading-left">
												<div class="course-lesson-icon">
													<i class="fa fa-trophy"></i>
												</div>
												<div class="title">
													<h4>4.2 Conclusion</h4>
													<p class="subtitle">03:17</p>
												</div>
											</div>
										</div>
										<div class="panel-content">
											<div class="panel-content-inner"> Congratulations on customizing this logo sting and exporting it out of After Effects! In this last lesson I will share some tips and ideas for even more customization!</div>
										</div>
									</div>
								</div>
								<!-- end course section -->

							</div>
							<!-- end single course content -->

							<!-- course reviews -->
							<div class="course-reviews">
								<div class="course-review-title">
									<h3>
										<i class="material-icons">chat_bubble_outline</i>
										Student Reviews
									</h3>
								</div>
								           <?php 
											$i0=0;
											$i1=0;
											$i2=0;
											$i3=0;
											$i4=0;
											$i5=0;
											$per=0; 
											$avg=0;
											?>
								<div class="course-reviews-inner">
									<div class="ratings-box">
										<div class="detailed-rating">
											<p>Detailed Rating</p>
											<div class="detailed-box">
												<ul class="detailed-lines">
													<li>
														<span>5 Stars</span>
														@foreach($rating as $a)
														@if(($a->course_id)==($course->id))
														@if($a->rating=='5')
														<?php $i5++; ?>
														@endif
														@endif
														@endforeach
														<?php
														$per=($i5*100)/$course->count(); 
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo$per ?>%"></span>
														</div>
														<span><?php echo$i5; ?></span>
													</li>
													<li>
														<span>4 Stars</span>
														@foreach($rating as $a)
														@if(($a->course_id)==($course->id))
														@if($a->rating=='4')
														<?php $i4++; ?>
														@endif
														@endif
														@endforeach
														<?php
														$per=($i4*100)/$course->count(); 
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo$per ?>%"></span>
														</div>
														<span><?php echo$i4; ?></span>
													</li>
													<li>
														<span>3 Stars</span>
														@foreach($rating as $a)
														@if(($a->course_id)==($course->id))
														@if($a->rating=='3')
														<?php $i3++; ?>
														@endif
														@endif
														@endforeach
														<?php
														$per=($i3*100)/$course->count(); 
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo$per ?>%"></span>
														</div>
														<span><?php echo$i3; ?></span>
													</li>
													<li>
														<span>2 Stars</span>
														@foreach($rating as $a)
														@if(($a->course_id)==($course->id))
														@if($a->rating=='2')
														<?php $i2++; ?>
														@endif
														@endif
														@endforeach
														<?php
														$per=($i2*100)/$course->count(); 
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo$per ?>%"></span>
														</div>
														<span><?php echo$i2; ?></span>
													</li>
													<li>
														<span>1 Stars</span>
														@foreach($rating as $a)
														@if(($a->course_id)==($course->id))
														@if($a->rating=='1')
														<?php $i1++; ?>
														@endif
														@endif
														@endforeach
														<?php
														$per=($i1*100)/$course->count(); 
														?>
														<div class="outer">
															<span class="inner-fill" style="width: <?php echo$per ?>%"></span>
														</div>
														<span><?php echo$i1; ?></span>
													</li>
												</ul>
											</div>
										</div>
										<div class="rating-average">
											<p>Average rating</p>
											<div class="average-box">
												<?php
												$avg=($i1*1)+($i2*2)+($i3*3)+($i4*4)+($i5*5);
												$avg=$avg/($i1+$i2+$i3+$i4+$i5);
												?>
												<span class="num"><?php echo($avg); ?></span>
												<span class="ratings">
													@for($i=1;$i<=round($avg);$i++)
													<i class="fa fa-star"></i>
													@endfor
												</span>
												<span class="txt"><?php echo($avg); ?> Ratings</span>
											</div>
										</div>
									</div>
									<ul class="comments">
										@foreach($rating as $a)
							            @if(($a->course_id)==($course->id))
										<li>
											<div class="image-holder">
												<img src="upload/blog/avatar4.jpg" alt="">
											</div>
											<div class="comment-content">
												<h2>
													{{$a->user_name}} 
													<span class="rating">
														@for($i=1;$i<=($a->rating);$i++)
														<i class="fa fa-star"></i>
														@endfor
													</span>
												</h2>
												<p>{{$a->review}}</p>
											</div>
										</li>
										@endif
							            @endforeach
									</ul>
									<form method="post" action="{{url('rating_submit')}}" enctype="multipart/form-data" class="add-review">
										<h1>Add a Review</h1>
										@if ($errors->any())
										<div class="alert alert-danger">
											<ul>
												@foreach($errors->all() as $error)
												<li>{{ $error }}</li>
												@endforeach
											</ul>
										</div>
										@endif
										@csrf
										<input type="hidden" name="course_id" value="{{$course->id}}">
										<input type="hidden" name="course_name" value="{{$course->c_name}}">
										<label>Your rating</label>
										<select name="rating" class="form-control">
											<option value="0">Rate...</option>
											<option value="5">Perfect</option>
											<option value="4">Good</option>
											<option value="3">Average</option>
											<option value="2">Not that bad</option>
											<option value="1">Very Poor</option>
										</select>
										<label>Your Review</label>
										<textarea type="text" class="form-control" placeholder="Enter Your Review" name="review"></textarea>
										<button type="submit" name="submit">Submit</button>
									</form>
								</div>
							</div>
							<!-- end course reviews -->

						</div>

					</div>

					<div class="col-lg-4">
						<div class="sidebar">
							<div class="widget course-widget">
								<p class="price">
									<span class="price-label">Price</span>
									<span class="amount"><del>₹{{$course->c_price+150}}</del>₹{{$course->c_price}}</span>
								</p>
								<form method="post" action="{{url('cartsubmit')}}" enctype="multipart/form-data">
								@csrf
								<input type="hidden" name="course_id" value="{{$course->id}}">
								<input type="hidden" name="course_name" value="{{$course->c_name}}">
								<input type="hidden" name="course_price" value="{{$course->c_price}}">
								<input type="hidden" name="image" value="{{$course->c_image}}">	
								<input class="btn btn-block btn-outline-primary" type="submit" name="submit" value="Add To Cart">
								</form>
								<br>
								<a class="btn btn-block btn-outline-success" href="{{url('checkout')}}">Buy This course</a>
								<br>
								<div class="product-meta-info-list">
									<h3>Course Features</h3>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">language</i>
										</div>
										<div class="value">Language: English</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">access_time</i>
										</div>
										<div class="value">7 hours on-demand video</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">playlist_add_check</i>
										</div>
										<div class="value">11 Lessons</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">spellcheck</i>
										</div>
										<div class="value">Study Level: Intermediate</div>
									</div>
									<div class="meta-info-unit">
										<div class="icon">
											<i class="material-icons">terrain</i>
										</div>
										<div class="value">Certificate of Completion</div>
									</div>
								</div>
								<ul class="share-list">
									@foreach($navbar as $a)
									<li><span>Share:</span></li>
									<li><a href="{{$a->facebook}}" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
									<li><a href="{{$a->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="{{$a->instagram}}" class="google"><i class="fa fa-instagram"></i></a></li>
									<li><a href="{{$a->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>

				</div>
						
			</div>
		</section>
		<!-- End single-course section -->
@endsection