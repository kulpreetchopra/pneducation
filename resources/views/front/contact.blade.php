@extends("front.master")
@section("title","ContactUs | PN-Education")
@section("content")
<!-- map section -->
		<div>
			@foreach($navbar as $a)
			<iframe src="{{$a->map}}" width="100%" height="580" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			@endforeach
		</div>
		<!-- end map section -->

		<!-- contact-section 
			================================================== -->
		<section class="contact-section">
			<div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            </div>
            @endif
				<div class="contact-box">
					<h1>Get in Touch</h1>
					<p>Someone finds it difficult to understand your creative idea? There is a better visualisation. Share your views with us, we’re looking forward to hear from you.</p>
					<form id="contact-form" method="post" action="{{url('contact_submit')}}" enctype="multipart/form-data">
                    @csrf
						<div class="row">
							<div class="col-md-6">
								<label for="name">Your Name (required)</label>
								<input name="name" id="name" type="text">
							</div>
							<div class="col-md-6">
								<label for="mail">Your Email (required)</label>
								<input name="email" id="mail" type="text">
							</div>
						</div>
						<label for="tel-number">Your Phone Number</label>
						<input name="contact" id="tel-number" type="text">
						<label for="comment">Your Message (required)</label>
						<textarea name="comment" id="comment"></textarea>
						<input type="submit" class="btn btn-primary" name="submit" value="Submit Contact">
						<div id="msg" class="message"></div>
					</form>
				</div>
			</div>
		</section>
		<!-- End contact section -->

		<!-- contact-info-section 
			================================================== -->
		<section class="contact-info-section">
			<div class="container">
				<div class="contact-info-box">
					<div class="row">
                        @foreach($navbar as $a)
						<div class="col-lg-4 col-md-6">
							<div class="info-post">
								<div class="icon">
									<i class="fa fa-envelope-o"></i>
								</div>
								<div class="info-content">
									<p>
										Tel: <a href="tel:{{$a->contact}}">{{$a->contact}}</a> <br>
										E-Mail: <a href="mailto:{{$a->email}}">{{$a->email}}</a>
									</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="info-post">
								<div class="icon">
									<i class="fa fa-map-marker"></i>
								</div>
								<div class="info-content">
									<p>{{$a->address}}
									</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="info-post">
								<div class="icon">
									<i class="fa fa-clock-o"></i>
								</div>
								<div class="info-content">
									<p>
										Our office is open:<br>
										{{$a->timing}}
									</p>
								</div>
							</div>
						</div>
                    @endforeach
					</div>
				</div>
			</div>
		</section>
		<!-- End contact-info section -->
@endsection