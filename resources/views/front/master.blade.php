<!doctype html>
<html lang="en" class="no-js">
<head>
	<title>@yield("title")</title>

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="{{url('css/studiare-assets.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/fonts/font-awesome/font-awesome.min.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{url('css/fonts/elegant-icons/style.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{url('css/fonts/iconfont/material-icons.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{url('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{url('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
</head>
<body>
    @foreach($navbar as $a)
	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">

			<div class="top-line">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<p>
							<i class="material-icons">account_circle</i>
							 <span>
								<?php 
								if(Auth::check()){
								$email=Auth::User()->email;
								$fname=Auth::User()->fname;
								$lname=Auth::User()->lname;
							    }
								else{
								$email="";
								$fname="You are not";
								$lname="logged in!!";
								}
								echo$fname;
								?>
								<span> </span>
								<?php echo$lname; ?>
							</span>
						</p>
						@if(Auth::check())
						<p><i class="material-icons">email</i> <span><?php echo$email; ?></span></p>
						@endif
						</div>
						<div class="col-lg-6">
							<div class="right-top-line">
								<ul class="top-menu">
								    @if(Auth::check())
									<li>
										<a href="{{url('account')}}">
											User Account
										</a>
									</li>
									@endif
									<li><a href="{{url('about')}}">About</a></li>
									<li><a href="{{url('contact')}}">Contact</a></li>
								</ul>
								<button class="search-icon">
									<i class="material-icons open-search">search</i> 
									<i class="material-icons close-search">close</i>
								</button>
								<button class="shop-icon">
									<a href="{{url('addtocart')}}">
									<i style="color:white" class="material-icons">shopping_cart</i>
									<span class="studiare-cart-number">{{$cart->count()}}</span>
									</a>
								</button>
								@foreach($navbar as $a)
								<button class="contact-info-icon">
									<a href="https://api.whatsapp.com/send?phone=+91 {{$a->contact}}&text=Hey PN-Education, I'd like to chat with you!!">
									<i style="color:white" class="material-icons">phone_android</i>
								    </a>
								</button>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>

			<form class="search_bar" method="post" action="{{url('search')}}" enctype="multipart/form-data">
				@csrf
				<div class="container">
					<input type="search" class="search-input" placeholder="What are you looking for..." name="search">
					<button type="submit" class="submit" name="submit">
						<i class="material-icons">search</i>
					</button>
				</div>
			</form>
			<center>
			@if(session('message'))
			<p class ="alert alert-success">
			    {{session('message')}}
			</p>
			@endif
			@if(session('wmessage'))
			<p class ="alert alert-danger">
				{{session('wmessage')}}
		    </p>
		    @endif
		    </center>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">

					<a class="navbar-brand" href="{{url('/')}}">
						<img src="{{ url('/front/'.$a->logo) }}" width="176" height="38" alt="">
					</a>

					<a href="#" class="mobile-nav-toggle"> 
						<span></span>
					</a>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="drop-link">
								<a class="active" href="{{url('/')}}">Home</a>
							</li>
							<li><a href="{{url('allcourses')}}">Courses</a></li>
							<li><a href="{{url('workshop')}}">Workshops</a></li>
							<li><a href="{{url('ourteam')}}">Our Team</a></li>
							<li><a href="{{url('interns')}}">Our Interns</a></li>
							<li><a href="{{url('placements')}}">Placements</a></li>
						</ul>
						@if(!Auth::check('login'))
						<a href="{{url('user_login')}}" style="background-color:#1A237E" class="login-button">Login</a>
						&nbsp;&nbsp;
						@else
						<a href="{{url('user_logout')}}" style="background-color:#1A237E" class="login-button">Logout</a>
						&nbsp;&nbsp;
						@endif
						<a href="{{url('signup')}}" style="background-color:#1A237E" class="login-button">Signup</a>
					</div>
				</div>
			</nav>

			<div class="mobile-menu">
				<div class="search-form-box">
					<form class="search-form" method="post" action="{{url('search')}}" enctype="multipart/form-data">
						@csrf
						<input type="search" class="search-field" placeholder="Enter keyword..." name="search">
						<button type="submit" class="search-submit" name="submit">
							<i class="material-icons open-search">search</i> 
						</button>
					</form>
				</div>
				<div class="shopping-cart-box">
					<a class="shop-icon" href="{{url('addtocart')}}">
						<i class="material-icons">shopping_cart</i>
						Cart
						<span class="studiare-cart-number">{{$cart->count()}}</span>
					</a>
					@if(Auth::check())
					<a href="{{url('account')}}">
						<i class="material-icons">account_circle</i>
						User Account
					</a>
					@endif
					@if(!Auth::check('login'))
					<a href="{{url('user_login')}}" class="login-button"><i class="material-icons">perm_identity</i>Login</a>
					@else
					<a href="{{url('user_logout')}}" class="login-button"><i class="material-icons">perm_identity</i>Logout</a>
					@endif
					<a href="{{url('/signup')}}"  class="login-button"><i class="material-icons">perm_identity</i>Signup</a>
				</div>
				<nav class="mobile-nav">
					<ul class="mobile-menu-list">
						<li><a class="active" href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('allcourses')}}">Courses</a></li>
						<li><a href="{{url('workshop')}}">Workshops</a></li>
						<li><a href="{{url('ourteam')}}">Our Team</a></li>
						<li><a href="{{url('interns')}}">Our Interns</a></li>
						</li>
						<li><a href="{{url('placements')}}">Placements</a></li>
						<li><a href="{{url('contact')}}">Contact Us</a></li>
						<li><a href="{{url('about')}}">About Us</a></li>
						@foreach($navbar as $a)
						<li><a href="https://api.whatsapp.com/send?phone=+91 {{$a->contact}}&text=Hey PN-Education, I'd like to chat with you">
						<i style="color:white" class="material-icons">phone_android</i> Whatsp Us
						</a>
					    </li>
					    @endforeach
					</ul>
				</nav>
			</div>

		</header>
		<!-- End Header -->

	@section("content")
    @show
    @if(Auth::check())
    <!--password Modal -->
  <div class="modal fade" id="password" role="dialog" style="margin-top:220px!important;">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#1A237E;color:white;">
        <h4 class="modal-title" id="myModalLabel"><i class="material-icons">vpn_key</i> Change Password</h4>
        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form method="post" action="{{url('update_password')}}" enctype="multipart/form-data">
          	@csrf
          	<input type="hidden" name="id" value="{{Auth::User()->id}}">
          	<div class="form-group">
          		<label>Password:</label>
          		<input type="text" class="form-control" placeholder="Enter New Password" name="password">
          	</div>
          	<input type="submit" class="btn btn-success" name="submit" value="Update">
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!--phone Modal -->
  <div class="modal fade" id="phone" role="dialog" style="margin-top:220px!important;">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#1A237E;color:white;">
        <h4 class="modal-title" id="myModalLabel"><i class="material-icons">vpn_key</i> Upadate Phone</h4>
        <button style="color:white" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <form method="post" action="{{url('update_phone')}}" enctype="multipart/form-data">
          	@csrf
          	<input type="hidden" name="id" value="{{Auth::User()->id}}">
          	<div class="form-group">
          		<label>Phone:</label>
          		<input type="tel" class="form-control" placeholder="Enter New Phone" name="phone" value="{{Auth::User()->phone}}">
          	</div>
          	<input type="submit" class="btn btn-success" name="submit" value="Update">
           </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
    <!-- footer 
			================================================== -->
		<footer>
			<div class="container">

				<div class="up-footer">
					<div class="row">

						<div class="col-lg-4 col-md-6">
							<div class="footer-widget text-widget">
								<a href="{{url('/')}}" class="footer-logo"><img src="{{ url('/front/'.$a->logo) }}" alt=""></a>
								<p>{{$a->about}}</p>
								<ul>
									<li>
										<div class="contact-info-icon">
											<i class="material-icons">location_on</i>
										</div>
										<div class="contact-info-value">{{$a->address}}</div>
									</li>
									<li>
										<div class="contact-info-icon">
											<i class="material-icons">phone_android</i>
										</div>
										<div class="contact-info-value">{{$a->contact}}</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="footer-widget quick-widget">
								<h2>Quick Links</h2>
								<ul class="quick-list">
									<li><a href="{{url('/')}}">Home</a></li>
									<li><a href="{{url('placements')}}">Placements</a></li>
									<li><a href="{{url('allcourses')}}">Courses</a></li>
									<li><a href="{{url('about')}}">About Us</a></li>
									<li><a href="{{url('ourteam')}}">Team</a></li>
									<li><a href="{{url('contact')}}">Contact Us</a></li>
									<li><a href="{{url('interns')}}">Interns</a></li>
									<li><a href="{{url('workshop')}}">Workshops</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="footer-widget subscribe-widget">
								<h2>Newsletter</h2>
								<p>Don’t miss anything, sign up now and keep informed about our company.</p>
							@if ($errors->any())
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
							@endif
									<form class="newsletter-form" method="post" action="{{url('subscribers_submit')}}" enctype="multipart/form-data">
                                    @csrf
                                    <?php 
								    if(Auth::check()){
								    	$email=Auth::User()->email;
								    	?>
								    	<input class="form-control" type="text" name="email" placeholder="Enter Your E-mail" value="<?php echo$email ?>" readonly>
								    	<?php
								    }
								    else{
								    	?>
								    	<input class="form-control" type="text" name="email" placeholder="Enter Your E-mail">
								    	<?php
								    }
								    ?>
									<input type="submit" name="submit" value="Subscribe">
								    </form>
							</div>
						</div>

					</div>
				</div>

			</div>

			<div class="footer-copyright copyrights-layout-default">
				<div class="container">
					<div class="copyright-inner">
						<div class="copyright-cell"> &copy; 2021 <span class="highlight">PN-Education</span>. Created by PN-Infosys Team.</div>
						<div class="copyright-cell">
							<ul class="studiare-social-links">
								<li><a href="{{$a->facebook}}" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="{{$a->twitter}}" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{$a->instagram}}" class="google"><i class="fa fa fa-instagram"></i></a></li>
								<li><a href="{{$a->linkedin}}" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->

	<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable();
    } );
	</script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="{{url('js/studiare-plugins.min.js')}}"></script>
	<script src="{{url('js/jquery.countTo.js')}}"></script>
	<script src="{{url('js/popper.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
	<script src="{{url('js/gmap3.min.js')}}"></script>
	<script src="{{url('js/script.js')}}"></script>
	<script type="text/javascript" src="{{url('js/extensions/revolution.extension.slideanims.min.js')}}"></script>
	<script type="text/javascript" src="{{url('js/extensions/revolution.extension.actions.min.js')}}"></script>
	<script type="text/javascript" src="{{url('js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
	<script type="text/javascript" src="{{url('js/extensions/revolution.extension.navigation.min.js')}}"></script>
	<script type="text/javascript" src="{{url('js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#mymodel').modal('show');
  });
    </script>
	<script>
		var tpj=jQuery;
		var revapi202;
		tpj(document).ready(function() {
			if (tpj("#rev_slider_202_1").revolution == undefined) {
				revslider_showDoubleJqueryError("#rev_slider_202_1");
			} else {
				revapi202 = tpj("#rev_slider_202_1").show().revolution({
					sliderType: "standard",
					jsFileLocation: "js/",
					dottedOverlay: "none",
					delay: 5000,
					navigation: {
						keyboardNavigation: "off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation: "off",
						onHoverStop: "off",
						arrows: {
					        enable: true,
					        style: 'gyges',
					        left: {
					            container: 'slider',
					            h_align: 'left',
					            v_align: 'center',
					            h_offset: 20,
					            v_offset: -60
					        },
					 
					        right: {
					            container: 'slider',
					            h_align: 'right',
					            v_align: 'center',
					            h_offset: 20,
					            v_offset: -60
					        }
					    },
						touch: {
							touchenabled: "on",
							swipe_threshold: 75,
							swipe_min_touches: 50,
							swipe_direction: "horizontal",
							drag_block_vertical: false
						},
						bullets: {
 
					        enable: false,
					        style: 'persephone',
					        tmp: '',
					        direction: 'horizontal',
					        rtl: false,
					 
					        container: 'slider',
					        h_align: 'center',
					        v_align: 'bottom',
					        h_offset: 0,
					        v_offset: 55,
					        space: 7,
					 
					        hide_onleave: false,
					        hide_onmobile: false,
					        hide_under: 0,
					        hide_over: 9999,
					        hide_delay: 200,
					        hide_delay_mobile: 1200
 						}
					},
					responsiveLevels: [1210, 1024, 778, 480],
					visibilityLevels: [1210, 1024, 778, 480],
					gridwidth: [1210, 1024, 778, 480],
					gridheight: [700, 700, 600, 600],
					lazyType: "none",
					parallax: {
						type: "scroll",
						origo: "slidercenter",
						speed: 1000,
						levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
						type: "scroll",
					},
					shadow: 0,
					spinner: "off",
					stopLoop: "off",
					stopAfterLoops: -1,
					stopAtSlide: -1,
					shuffle: "off",
					autoHeight: "off",
					fullScreenAutoWidth: "off",
					fullScreenAlignForce: "off",
					fullScreenOffsetContainer: "",
					fullScreenOffset: "0px",
					disableProgressBar: "on",
					hideThumbsOnMobile: "off",
					hideSliderAtLimit: 0,
					hideCaptionAtLimit: 0,
					hideAllCaptionAtLilmit: 0,
					debugMode: false,
					fallbacks: {
						simplifyAll: "off",
						nextSlideOnWindowFocus: "off",
						disableFocusListener: false,
					}
				});
			}
		}); /*ready*/
	</script>	
	<!-- Data Tables Scripts -->
	<script src="{{url('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{url('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{url('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{url('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
      "iDisplayLength": 5
    });
  });
</script>

@endforeach	
</body>
</html>